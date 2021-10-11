$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
            $('#toTopBtn').fadeIn();
        } else {
            $('#toTopBtn').fadeOut();
        }
    });

    $("#sidebar-togle").click();
});

// generate button ajax
$("#generate-btn").click(function() {
    $("#logsController").find("li").remove();
    $("#logsModel").find("li").remove();
    $("#logsView").find("li").remove();
    $("#logsConfig").find("li").remove();
    $("#logsLibrary").find("li").remove();
    $("#logsTemplate").find("li").remove();

    $(".progress-main").css("width", "0");
    $(".progress-config").css("width", "0");
    $(".progress-file").css("width", "0");

    $(".status-main").html('<i class="fas fa-spinner fa-pulse"></i>');
    $(".status-main").removeClass("text-success");
    $(".status-main").removeClass("text-danger");
    $(".status-config").html('<i class="fas fa-spinner fa-pulse"></i>');
    $(".status-config").removeClass("text-success");
    $(".status-config").removeClass("text-danger");
    $(".status-file").html('<i class="fas fa-spinner fa-pulse"></i>');
    $(".status-file").removeClass("text-success");
    $(".status-file").removeClass("text-danger");

    if (confirm('This will replace everything, double check before proceed !')) {
        var text = $("#loading-process").html();

        Swal.fire({
            title: 'Processing Request....',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            html: text
        });

        // process main
        $.post("core/process-main.php", $("#main-form").serialize()).done(function(data) {
                var progres = 0,
                    c = false,
                    m = false,
                    v = false,
                    cv = 0,
                    mv = 0,
                    vv = 0;
                if (data.Controller) {
                    cv = data.Controller.length;
                    if (cv >= 1) {
                        $(data.Controller).each(function(index, value) {
                            if (value.substr(0, 6) == "../../") {
                                $("#logsController").append('<li>../' + value.substr(6) + '</li>');
                            } else {
                                $("#logsController").append('<li>../' + value + '</li>');
                            }
                        })
                    }
                    progres += 30;
                    c = true;
                }
                if (data.Model) {
                    mv = data.Model.length;
                    if (mv >= 1) {
                        $(data.Model).each(function(index, value) {
                            if (value.substr(0, 6) == "../../") {
                                $("#logsModel").append('<li>../' + value.substr(6) + '</li>');
                            } else {
                                $("#logsModel").append('<li>../' + value + '</li>');
                            }
                        })
                    }
                    progres += 30;
                    m = true;
                }
                if (data.View) {
                    vv = data.View.length;
                    if (vv >= 1) {
                        $(data.View).each(function(index, value) {
                            if (value.substr(0, 6) == "../../") {
                                $("#logsView").append('<li>../' + value.substr(6) + '</li>');
                            } else {
                                $("#logsView").append('<li>../' + value + '</li>');
                            }
                        })
                    }
                    progres += 30;
                    v = true;
                }
                progres += 10;
                if (c && m && v) {
                    $(".status-main").text("OK");
                    $(".status-main").addClass("text-success");
                } else {
                    $(".status-main").text("ERROR");
                    $(".status-main").addClass("text-danger");
                    $(".progress-main").removeClass("bg-success");
                    $(".progress-main").addClass("bg-danger");
                    console.log(data);
                }
                if (cv >= 1 || mv >= 1 || vv >= 1) {
                    $(".progress-main").css("width", progres.toString() + "%");
                }
            })
            .fail(function() {
                $(".progress-main").css("width", "0");
                $(".status-main").text("ERROR");
                $(".status-main").addClass("text-danger");
            })
            .always(function() {
                $("#log-container-controller").removeClass("d-none");
                $("#log-container-model").removeClass("d-none");
                $("#log-container-view").removeClass("d-none");
            });

        // process config
        $.post("core/process-config.php", $("#main-form").serialize()).done(function(data) {
                if (data.Config) {
                    if (data.Config.length >= 1) {
                        $(data.Config).each(function(index, value) {
                            if (value.substr(0, 6) == "../../") {
                                $("#logsConfig").append('<li>../' + value.substr(6) + '</li>');
                            } else {
                                $("#logsConfig").append('<li>../' + value + '</li>');
                            }
                        })
                        $(".progress-config").css("width", "100%");
                    }
                    $(".status-config").text("OK");
                    $(".status-config").addClass("text-success");
                } else {
                    $(".status-config").text("ERROR");
                    $(".status-config").addClass("text-danger");
                    $(".progress-config").removeClass("bg-success");
                    $(".progress-config").addClass("bg-danger");
                    $(".progress-config").css("width", "10%");
                    console.log(data);
                }
            })
            .fail(function() {
                $(".progress-config").css("width", "0");
                $(".status-config").text("ERROR");
                $(".status-config").addClass("text-danger");
            })
            .always(function() {
                $("#log-container-config").removeClass("d-none");
            });

        // process file
        $.post("core/process-file.php", $("#main-form").serialize()).done(function(data) {
                var progres = 0,
                    l = false,
                    t = false,
                    lv = 0,
                    tv = 0;
                if (data.Library) {
                    lv = data.Library.length;
                    if (lv >= 1) {
                        $(data.Library).each(function(index, value) {
                            if (value.substr(0, 6) == "../../") {
                                $("#logsLibrary").append('<li>../' + value.substr(6) + '</li>');
                            } else {
                                $("#logsLibrary").append('<li>../' + value + '</li>');
                            }
                        })
                    }
                    progres += 50;
                    l = true;
                }
                if (data.Template) {
                    tv = data.Template.length;
                    if (tv >= 1) {
                        $(data.Template).each(function(index, value) {
                            if (value.substr(0, 6) == "../../") {
                                $("#logsTemplate").append('<li>../' + value.substr(6) + '</li>');
                            } else {
                                $("#logsTemplate").append('<li>../' + value + '</li>');
                            }
                        })
                    }
                    progres += 50;
                    t = true;
                }
                if (l && t) {
                    $(".status-file").text("OK");
                    $(".status-file").addClass("text-success");
                } else {
                    $(".status-file").text("ERROR");
                    $(".status-file").addClass("text-danger");
                    $(".progress-file").removeClass("bg-success");
                    $(".progress-file").addClass("bg-danger");
                    console.log(data);
                }
                if (lv >= 1 || tv >= 1) {
                    $(".progress-file").css("width", progres.toString() + "%");
                }
            })
            .fail(function() {
                $(".progress-file").css("width", "0");
                $(".status-file").text("ERROR");
                $(".status-file").addClass("text-danger");
            })
            .always(function() {
                $("#log-container-library").removeClass("d-none");
                $("#log-container-template").removeClass("d-none");

                if ($("#sidebar-container").hasClass("d-block")) {

                } else {
                    $("#sidebar-container").animate({
                        opacity: 1,
                        width: "toggle"
                    }, 500, function() {
                        $("#sidebar-container").addClass("d-block");
                        $("#sidebar-togle").find("i").removeClass("fa-angle-right");
                        $("#sidebar-togle").find("i").addClass("fa-angle-left");
                    });
                }
            });
    } else {
        return false;
    }
})

// float button
$('#toTopBtn').click(function() {
    $("html, body").animate({
        scrollTop: 0
    }, 1000);
    return false;
});

// sidebar togle
$("#sidebar-togle").click(function(e) {
    e.preventDefault();
    if ($("#sidebar-container").hasClass("d-block")) {
        $("#sidebar-container").animate({
            opacity: 0,
            width: "toggle"
        }, 500, function() {
            $("#sidebar-container").removeClass("d-block");
            $("#sidebar-togle").find("i").removeClass("fa-angle-left");
            $("#sidebar-togle").find("i").addClass("fa-angle-right");
        });
    } else {
        $("#sidebar-container").animate({
            opacity: 1,
            width: "toggle"
        }, 500, function() {
            $("#sidebar-container").addClass("d-block");
            $("#sidebar-togle").find("i").removeClass("fa-angle-right");
            $("#sidebar-togle").find("i").addClass("fa-angle-left");
        });
    }

    return false;
});

// tab change
$("a.tabbable-link-item").on("click", function(e) {
    e.preventDefault();
    $("a.tabbable-link-item").each(function() {
        $(this).find("span").remove();
    });
    $(this).append('<span class="float-right" style="margin-right:26%;"><i class="fa fa-angle-right"></i></span>');
});

// select signle table
$(".tab-cb").change(function() {
    var thissite = $(this).closest(".tab-pane").attr("id"),
        thisvalue = this;
    $("a.tabbable-link-item").each(function() {
        if ($(this).attr("aria-controls") == thissite) {
            $(this).find("b").eq(0).remove();
            if (thisvalue.checked) {
                $(this).prepend('<b class="fa fa-check text-success"></b>');
            };
            return false;
        }
    });
    $(this).closest(".tab-pane").find("input").each(function() {
        if ($(this).hasClass("tab-cb")) return true;
        if (thisvalue.checked) {
            $(this).removeAttr("disabled");
        } else {
            $(this).attr("disabled", true);
        };
    })
});

// select all table
$("#parent-cb").change(function() {
    var parentcb = this;
    if (parentcb.checked) {
        $("a.tabbable-link-item").each(function() {
            $(this).find("b").eq(0).remove();
            $(this).prepend('<b class="fa fa-check text-success"></b>');
        })
    } else {
        $("a.tabbable-link-item").each(function() {
            $(this).find("b").eq(0).remove();
        })
    }
    $(".tab-cb").each(function() {
        this.checked = parentcb.checked;
        $(this).closest(".tab-pane").find("input").each(function() {
            if ($(this).hasClass("tab-cb")) return true;
            if (parentcb.checked) {
                $(this).removeAttr("disabled");
            } else {
                $(this).attr("disabled", true);
            };
        })
    })
});

// Check all config options
$("#check-config").change(function() {
    var parentcb = this;

    document.getElementById("writeroute").checked = parentcb.checked;
    document.getElementById("writedefaultLocale").checked = parentcb.checked;
    document.getElementById("defaultindexPage").checked = parentcb.checked;
    var cbl = document.getElementById("useLocale")
    cbl.checked = parentcb.checked;
    changeUseLocale(cbl);
    document.getElementById("negotiateLocale").checked = parentcb.checked;
    document.getElementById("supportedLocales").checked = parentcb.checked;
})

// Check all required files options
$("#check-files").change(function() {
    var parentcb = this;

    document.getElementById("templating").checked = parentcb.checked;
    document.getElementById("bootstrap").checked = parentcb.checked;
    document.getElementById("fontawesome").checked = parentcb.checked;
    document.getElementById("jquery").checked = parentcb.checked;
    document.getElementById("lang").checked = parentcb.checked;
    document.getElementById("basecontroller").checked = parentcb.checked;
    document.getElementById("homecontroller").checked = parentcb.checked;
    document.getElementById("helper").checked = parentcb.checked;
    document.getElementById("replace_spreadsheet").checked = parentcb.checked;
    document.getElementById("replace_mpdf").checked = parentcb.checked;
})

// field selector
$(".field-cb-parent").change(function() {
    var parentcb = this;
    $(this).closest("table").find(".field-cb").each(function() {
        this.checked = parentcb.checked;
    })
});

$(".crete-controller-cb").change(function() {
    if (this.checked) {
        $(this).closest(".input-group").find("input[type=text]").removeAttr("disabled");
        $(this).closest(".input-group").find("input[type=text]").attr("required", true);
    } else {
        $(this).closest(".input-group").find("input[type=text]").val("");
        $(this).closest(".input-group").find("input[type=text]").attr("disabled", true);
        $(this).closest(".input-group").find("input[type=text]").removeAttr("required");
    }
});

$(".crete-model-cb").change(function() {
    if (this.checked) {
        $(this).closest(".input-group").find("input[type=text]").removeAttr("disabled");
        $(this).closest(".input-group").find("input[type=text]").attr("required", true);
    } else {
        $(this).closest(".input-group").find("input[type=text]").val("");
        $(this).closest(".input-group").find("input[type=text]").attr("disabled", true);
        $(this).closest(".input-group").find("input[type=text]").removeAttr("required");
    }
});

$("#use-level").change(function() {
    if (this.checked) {
        $(this).closest(".input-group").find("input[type=text]").removeAttr("disabled");
        $(this).closest(".input-group").find("input[type=text]").attr("required", true);
    } else {
        $(this).closest(".input-group").find("input[type=text]").val("");
        $(this).closest(".input-group").find("input[type=text]").attr("disabled", true);
        $(this).closest(".input-group").find("input[type=text]").removeAttr("required");
    }
});

$("#timezone-cb").change(function() {
    if (this.checked) {
        $(this).closest(".input-group").find("input[type=text]").removeAttr("disabled");
        $(this).closest(".input-group").find("input[type=text]").attr("required", true);
        $(this).closest(".input-group").find("input[type=text]").val("Asia/Jakarta");
    } else {
        $(this).closest(".input-group").find("input[type=text]").val("");
        $(this).closest(".input-group").find("input[type=text]").attr("disabled", true);
        $(this).closest(".input-group").find("input[type=text]").removeAttr("required");
    }
})

$("#defaultLocale").change(function() {
    $("#selected-locale").text($(this).val());
})

$("#useLocale").change(function() {
    changeUseLocale(this);
});

function changeUseLocale(cb) {
    var l = cb;
    if (l.checked) {
        var lang = document.getElementById("lang");
        if (lang.checked == false) {
            $("#lang-warning").removeClass("d-none");
            $("#lang-warning-text").removeClass("d-none");
            return;
        }
    }
    $("#lang-warning").addClass("d-none");
    $("#lang-warning-text").addClass("d-none");
}

$("#lang").change(function(e) {
    var lang = this,
        useLocale = document.getElementById("useLocale");
    if (useLocale.checked) {
        if (lang.checked) {
            $("#lang-warning").addClass("d-none");
            $("#lang-warning-text").addClass("d-none");
            return;
        } else {
            $("#lang-warning").removeClass("d-none");
            $("#lang-warning-text").removeClass("d-none");
            return;
        }
    }
    $("#lang-warning").addClass("d-none");
    $("#lang-warning-text").addClass("d-none");
})