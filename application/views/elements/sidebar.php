<div class="col-md-3 col-md-pull-9">
    <div id="left" class="span3">
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $("#left").load("<?= base_url() ?>categories_json", function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#left").html(msg + xhr.status + " " + xhr.statusText);
            }
        });

        $(document).on("click", "#left ul.nav li.parent > a > span.sign", function() {
            $(this).find('i:first').toggleClass("icon-minus");
        });

        // Open Le current menu
        $("#left ul.nav li.parent.active > a > span.sign").find('i:first').addClass("icon-minus");
        $("#left ul.nav li.current").parents('ul.children').addClass("in");
    });
</script>