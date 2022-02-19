$(document).ready(function () {

    var ua = detect.parse(navigator.userAgent);
    $("html").addClass(ua.device.type + " " + ua.device.family + " " + ua.os.family + " " + ua.browser.family)

    if ($(".timeBl").length > 0) {
        clock();
    }

    if ($("header").length > 0) {
        var timeOut = false;
        $("header .menuBtn").click(function () {
            if (timeOut) return false;
            $("header .menuBtn").toggleClass("selected")
            $(".lineTop .menu").slideToggle(500);
            setTimeout(function () {
                timeOut = false;
            }, 500);
        })
    }

    if ($(".lkPage").length > 0) {
        var timeOut = false;
        $(".lkPage .menuBtn").click(function () {
            if (timeOut) return false;
            $(".lkPage .menuBtn").toggleClass("selected")
            $(".lkMenu").slideToggle(500);
            setTimeout(function () {
                timeOut = false;
            }, 500);
        })
    }

    if ($(".copyLink").length > 0) {
        new ClipboardJS('.copyLink');
    }

    if ($(".selectricBl").length > 0) {
        $(".selectricBl").map(function () {
            $(this).selectric()
        })
    }

    if ($(".tabs").length > 0) {
        $(".tabs").map(function () {
            $(this).tabs()
        })
    }

    if ($(".circlePr").length > 0) {
        $(".circlePr").map(function () {
            $(this).find("input").knob({
                width: 110,
                min: 0,
                max: 100,
                fgColor: "#fedc00",
                bgColor: "#dc2272",
                readOnly: true,
                draw: function () { $(this.i).val(this.cv + '%'); }
            })
        })
    }

    if ($(".faqBl").length > 0) {
        var timeOut = false;
        $(".quest").map(function () {
            $(this).click(function () {
                if (timeOut) return false;
                $(this).toggleClass("open")
                $(this).parents(".questLine").find(".answer").slideToggle()
                timeOut = true;
                setTimeout(function () {
                    timeOut = false;
                }, 500);
            })
        })
    }

    if ($(".filterBl").length > 0) {
        var dateFormat = "dd.mm.yy",
            from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    dateFormat: "dd.mm.yy"
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
            to = $("#to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: "dd.mm.yy"
            })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
    }

    if ($(".tableReferals").length > 0) {
        var timeOut = false;
        $(".tableReferals .infoLine").click(function () {
            if (timeOut) return false;
            $(this).toggleClass("open").parents(".item").find(".desrLine").slideToggle();
            timeOut = true;
            setTimeout(function () {
                timeOut = false;
            }, 500);
        })
    }

    // if ($('.listPlan').length > 0) {
    //     $('.listPlan').find('input:not(:disabled) + label').on('click', function () {
    //         var active = $(this).siblings('input').attr('data-index');
    //         $(".formaPlan .selectricBl").prop('selectedIndex', active).selectric('refresh');
    //     });
    // }
    // if ($('.formaPlan .selectricBl').length > 0) {
    //     $('.formaPlan .selectricBl').map(function () {
    //         $(this).selectric({
    //             onInit: function () {
    //                 pushSelectricItemsPlanIcon(this)
    //                 changeSelectricPlanIcon($(this).parents('.selectric-wrapper'))
    //             },
    //             onChange: function () {
    //                 changeSelectricPlanIcon($(this).parents('.selectric-wrapper'));

    //                 var changePl = $(this).prop('selectedIndex');
    //                 var itemBl = $('.listPlan').find('.item').eq(changePl);
    //                 var input = itemBl.find("input")
    //                 input.prop('checked', true);

    //                 input.siblings('label').trigger('click');
    //             }
    //         });
    //     });

    //     $('.formaPlan .selectricBl').on('selectric-refresh', function () {
    //         pushSelectricItemsPlanIcon(this)
    //         changeSelectricPlanIcon($(this).parents('.selectric-wrapper'))
    //     });
    // }

    openMod();

    new WOW().init();
})


var changeSelectricPlanIcon = function (el) {
    el
        .find(".label")
        .prepend(
            el
                .find(".selectric-items li.selected [class*='icon']")
                .clone()
        )
}
var pushSelectricItemsPlanIcon = function (el) {
    $(el).find("option").map(function () {
        var el = $(this);
        var planIcon = el.attr("data-icon");

        var li = $(this).parents(".selectric-wrapper").find("li").eq(el.index());
        var liText = li.text();
        li.html("<span class='" + planIcon + "'></span>" + liText);
    })
}