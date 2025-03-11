$(function () {
        "use strict";
        new PerfectScrollbar(".app-container"),
            new PerfectScrollbar(".header-message-list"),
            /*new PerfectScrollbar(".header-notifications-list"),*/

            $(".mobile-search-icon").on("click", function () {

                $(".search-bar").addClass("full-search-bar")

            }),

            $(".search-close").on("click", function () {
                $(".search-bar").removeClass("full-search-bar")
            }),


            $(".mobile-toggle-menu").on("click", function () {
                $(".wrapper").addClass("toggled")
            }), $(".toggle-icon").click(function () {
            $(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function () {
                $(".wrapper").addClass("sidebar-hovered")
            }, function () {
                $(".wrapper").removeClass("sidebar-hovered")
            }))
        }), $(document).ready(function () {
            $(window).on("scroll", function () {
                $(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
            }), $(".back-to-top").on("click", function () {
                return $("html, body").animate({
                    scrollTop: 0
                }, 600), !1
            })
        }),

            $(document).ready(function () {
                $(window).on("scroll", function () {
                    if ($(this).scrollTop() > 60) {
                        $('.topbar').addClass('bg-dark');
                    } else {
                        $('.topbar').removeClass('bg-dark');
                    }
                });
                $('.back-to-top').on("click", function () {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 600);
                    return false;
                });
            });


        $(function () {
            for (var e = window.location, o = $(".metismenu li a").filter(function () {
                return this.href == e
            }).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
        }), $(function () {
            $("#menu").metisMenu()
        }), $(".chat-toggle-btn").on("click", function () {
            $(".chat-wrapper").toggleClass("chat-toggled")
        }), $(".chat-toggle-btn-mobile").on("click", function () {
            $(".chat-wrapper").removeClass("chat-toggled")
        }), $(".email-toggle-btn").on("click", function () {
            $(".email-wrapper").toggleClass("email-toggled")
        }), $(".email-toggle-btn-mobile").on("click", function () {
            $(".email-wrapper").removeClass("email-toggled")
        }), $(".compose-mail-btn").on("click", function () {
            $(".compose-mail-popup").show()
        }), $(".compose-mail-close").on("click", function () {
            $(".compose-mail-popup").hide()
        }),


            $(".switcher-btn").on("click", function () {
                $(".switcher-wrapper").toggleClass("switcher-toggled")
            }), $(".close-switcher").on("click", function () {
            $(".switcher-wrapper").removeClass("switcher-toggled")
        });

        /*$('#theme1').click(setTheme('theme1'));
        $('#theme2').click(setTheme('theme2'));
        $('#theme3').click(setTheme('theme3'));
        $('#theme4').click(setTheme('theme4'));
        $('#theme5').click(setTheme('theme5'));
        $('#theme6').click(setTheme('theme6'));
        $('#theme7').click(setTheme('theme7'));
        $('#theme8').click(setTheme('theme8'));
        $('#theme9').click(setTheme('theme9'));
        $('#theme10').click(setTheme('theme10'));
        $('#theme11').click(setTheme('theme11'));
        $('#theme12').click(setTheme('theme12'));
        $('#theme13').click(setTheme('theme13'));
        $('#theme14').click(setTheme('theme14'));
        $('#theme15').click(setTheme('theme15'));
        $('#theme22').click(setTheme('theme22'));


        function theme1() {
            localStorage.setItem("theme",'bg-theme bg-theme1');
            $('body').attr('class', 'bg-theme bg-theme1');
        }

        function theme2() {
            localStorage.setItem("theme",'bg-theme bg-theme2');
            $('body').attr('class', 'bg-theme bg-theme2');
        }

        function theme3() {
            localStorage.setItem("theme",'bg-theme bg-theme3');
            $('body').attr('class', 'bg-theme bg-theme3');
        }

        function theme4() {
            localStorage.setItem("theme",'bg-theme bg-theme4');
            $('body').attr('class', 'bg-theme bg-theme4');
        }

        function theme5() {
            localStorage.setItem("theme",'bg-theme bg-theme5');
            $('body').attr('class', 'bg-theme bg-theme5');
        }

        function theme6() {
            localStorage.setItem("theme",'bg-theme bg-theme6');
            $('body').attr('class', 'bg-theme bg-theme6');
        }

        function theme7() {
            localStorage.setItem("theme",'bg-theme bg-theme7');
            $('body').attr('class', 'bg-theme bg-theme7');
        }

        function theme8() {
            localStorage.setItem("theme",'bg-theme bg-theme8');
            $('body').attr('class', 'bg-theme bg-theme8');
        }

        function theme9() {
            localStorage.setItem("theme",'bg-theme bg-theme9');
            $('body').attr('class', 'bg-theme bg-theme9');
        }

        function theme10() {
            localStorage.setItem("theme",'bg-theme bg-theme10');
            $('body').attr('class', 'bg-theme bg-theme10');
        }

        function theme11() {
            localStorage.setItem("theme",'bg-theme bg-theme11');
            $('body').attr('class', 'bg-theme bg-theme11');
        }

        function theme12() {
            localStorage.setItem("theme",'bg-theme bg-theme12');
            $('body').attr('class', 'bg-theme bg-theme12');
        }

        function theme13() {
            localStorage.setItem("theme",'bg-theme bg-theme13');
        }

        function theme14() {
            localStorage.setItem("theme",'bg-theme bg-theme14');
            $('body').attr('class', 'bg-theme bg-theme14');
        }

        function theme15() {
            localStorage.setItem("theme",'bg-theme bg-theme15');
            $('body').attr('class', 'bg-theme bg-theme15');
        }

        function theme22() {
            localStorage.setItem("theme",'bg-theme bg-theme22');
            $('body').attr('class', 'bg-theme bg-theme22');
        }*/


    }
);