$(function() {
    const pg = $("p.pg").attr('id');
    const om = $("p.om").attr('id');
    const ident = $("p.ident").attr('id');

    $(".maskIdentidade").mask("000.000.000-00");

    const verificaDias = function() {
        return new Promise((resolve, reject) => {
            $.ajax({
                type: "POST",
                url: "controllers/consulta.php",
                dataType: 'json',
                success: function(data) {
                    if (data.error) {
                        reject(data.error);
                    } else {
                        resolve(data);
                    }
                },
                error: function(xhr, status, error) {
                    reject(error);
                }
            });
        });
    };

    const VerificaBloqueios = function() {
        let datesForbbiden, refForbbiden, motForbbidden;
        $.ajax({
            async: false,
            type: "POST",
            url: "controllers/bloqueios.php",
            dataType: 'json',
            data: { pg: pg, om: om },
            success: function(data) {
                datesForbbiden = data.dias;
                refForbbiden = data.refeicao;
                motForbbidden = data.motivo;
            }
        });
        return [datesForbbiden, refForbbiden, motForbbidden];
    };

    const bloqueios = VerificaBloqueios();
    let cafe_bloq_dias = "", almoco_bloq_dias = "", janta_bloq_dias = "";
    const bloq_ref = bloqueios[1];

    if ($.inArray("1", bloq_ref) > -1) {
        cafe_bloq_dias = bloqueios[0];
        $('.box-motivo-bloqueio-cafe').html(bloqueios[2]);
    }
    if ($.inArray("2", bloq_ref) > -1) {
        almoco_bloq_dias = bloqueios[0];
        $('.box-motivo-bloqueio-almoco').html(bloqueios[2]);
    }
    if ($.inArray("3", bloq_ref) > -1) {
        janta_bloq_dias = bloqueios[0];
        $('.box-motivo-bloqueio-janta').html(bloqueios[2]);
    }

    $('#login-modal').on('shown.bs.modal', function() {
        $('.maskIdentidade').focus();
    });

    $('#identidade').keypress(function(event) {
        if (event.which == 13) {
            $("#form-login").submit();
        }
    });

    $('#form-login').validate({
        rules: {
            identidade: {
                required: true,
                minlength: 5
            }
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            const $i = $('#identidade').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "controllers/autentica.php",
                data: { identidade: $i },
                success: function(data) {
                    if (data.erro) {
                        $('#box-login').html(data.erro);
                    } else {
                        window.location = data.url;
                    }
                }
            });
            return false;
        }
    });

    async function init() {
        try {
            const diasArranchado = await verificaDias();
            processDiasArranchado(diasArranchado);
			console.log(diasArranchado);
        } catch (error) {
            console.error("Erro ao verificar dias:", error);
        }
    }

    function processDiasArranchado(diasArranchado) {
        let DiasCafe = [], DiasAlmoco = [], DiasJanta = [];

        $.each(diasArranchado, function() {
            if (this.tipo == "1") {
                DiasCafe = this.date.split(',');
            }
            if (this.tipo == "2") {
                DiasAlmoco = this.date.split(',');
            }
            if (this.tipo == "3") {
                DiasJanta = this.date.split(',');
            }
        });

        const setupDatepicker = function(selector, datesDisabled, Dias) {
            $(selector).datepicker({
                datesDisabled: datesDisabled,
                format: "dd/mm/yyyy",
                language: "pt-BR",
                daysOfWeekHighlighted: [0, 6],
                orientation: "top auto",
                startDate: '+2d',
                todayHighlight: true,
                endDate: '+14d',
                beforeShowDay: function(date) {
                    const m = ("0" + (date.getMonth() + 1)).slice(-2),
                        d = ("0" + date.getDate()).slice(-2),
                        y = date.getFullYear();
                    const dateFormat = y + "-" + m + "-" + d;
                    if (Array.isArray(Dias) && Dias.includes(dateFormat)) {
                        return {
                            tooltip: 'Arranchado',
                            classes: 'active'
                        };
                    }
                    return {};
                }
            }).on('changeDate', function(e) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "controllers/registros.php",
                    data: { data: e.format(0, "yyyy-mm-dd"), tipo: selector === '#cafe-container' ? '1' : selector === '#almoco-container' ? '2' : '3' },
                    success: function(data) {
                        if (data.error) {
                            window.alert(data.error);
                        }
                    }
                });
				window.location.href = `index.php?pasta=home&pagina=inicio&refeicao=${selector === '#cafe-container' ? 'cafe' : selector === '#almoco-container' ? 'almoco' : 'jantar'}`;
            });
        };

        setupDatepicker('#cafe-container', cafe_bloq_dias, DiasCafe);
        setupDatepicker('#almoco-container', almoco_bloq_dias, DiasAlmoco);
        setupDatepicker('#janta-container', janta_bloq_dias, DiasJanta);

        const atualizarListaDiasArranchados = function() {
            const lista = $('#dias-arranchado-list');
            lista.empty();

            let diasFuturos = [];
            let diasPassados = [];
            const hoje = new Date();

            $.each(diasArranchado, function(index, item) {
                let refeicao = '';
                if (item.tipo == "1") refeicao = "café da manhã";
                if (item.tipo == "2") refeicao = "almoço";
                if (item.tipo == "3") refeicao = "jantar";

                const dias = item.date.split(',');
                $.each(dias, function(i, dia) {
                    const data = new Date(dia);
                    data.setUTCHours(+27, 59, 59, 0);

                    if (data >= hoje) {
                        diasFuturos.push({
                            data: data,
                            refeicao: refeicao
                        });
                    } else {
                        diasPassados.push({
                            data: data,
                            refeicao: refeicao
                        });
                    }
                });
            });

            diasFuturos = ordenarPorDataERefeicao(diasFuturos);
            diasPassados = ordenarDaFrenteParaTras(diasPassados);

            const diasOrdenados = diasFuturos.concat(diasPassados);

            $.each(diasOrdenados, function(i, item) {
                const diaTexto = item.data.toLocaleDateString('pt-BR');
                const classe = item.data >= hoje ? '' : 'disabled';
                const iconeHoje = item.data.toDateString() === hoje.toDateString() ? '<i class="fa-solid fa-calendar-week"></i> ' : '';
                lista.append('<li class="list-group-item ' + classe + '"><strong>' + diaTexto + '</strong>' + ' <i class="fa-solid fa-arrow-right"></i> ' + iconeHoje + item.refeicao.toUpperCase() + '</li>');
            });
        };

        atualizarListaDiasArranchados();
    }

    // Chame a função init para iniciar o processo
    init();

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('fa-arrow-circle-up fa-arrow-circle-down');
    }
    $('.accordion').on('hidden.bs.collapse', toggleChevron);
    $('.accordion').on('shown.bs.collapse', toggleChevron);

    const remoto_avisos = function(url) {
        const spinner = "<div class='text-center'><i class='fa fa-spinner fa-spin fa-3x fa-fw'></i></div>";
        $("#avisos .modal-body").html(spinner);
        $("#avisos .modal-body").load(url);
        $("#avisos").modal("show");
    };

    $('.avisos').click(function() {
        remoto_avisos('controllers/avisos.php');
    });

    const ordenarPorDataERefeicao = function(dias) {
        return dias.sort(function(a, b) {
            if (a.data < b.data) return -1;
            if (a.data > b.data) return 1;
            const ordemRefeicao = ["café da manhã", "almoço", "jantar"];
            return ordemRefeicao.indexOf(a.refeicao) - ordemRefeicao.indexOf(b.refeicao);
        });
    };

    const ordenarDaFrenteParaTras = function(dias) {
        return dias.sort(function(a, b) {
            if (a.data < b.data) return 1;
            if (a.data > b.data) return -1;
            const ordemRefeicao = ["café da manhã", "almoço", "jantar"];
            return ordemRefeicao.indexOf(a.refeicao) - ordemRefeicao.indexOf(b.refeicao);
        });
    };
});