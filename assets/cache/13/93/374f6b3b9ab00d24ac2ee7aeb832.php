<?php

/* modules/kontrak/form.html */
class __TwigTemplate_1393374f6b3b9ab00d24ac2ee7aeb832 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>
    function loadkantor(kode_kantor) {
        var edit_id = \"";
        // line 3
        if (isset($context["kode_kantor"])) { $_kode_kantor_ = $context["kode_kantor"]; } else { $_kode_kantor_ = null; }
        echo twig_escape_filter($this->env, $_kode_kantor_, "html", null, true);
        echo "\";
        \$(\"#kontrak-form #kode_kantor\").find('option').remove();
        \$(\"#kontrak-form #kode_kantor\").append('<option value=\"\"> - SELECT KANTOR - </option>');
        if (\$(\"#kontrak-form #id_osp\") != \"\") {
            \$.ajax({
                type: \"POST\",
                url: \"";
        // line 9
        echo twig_escape_filter($this->env, site_url("kantor/getlist_by_osp_ajax"), "html", null, true);
        echo "\",
                data: {
                    id_osp: \$(\"#kontrak-form #id_osp\").val(),
                    id_kabupaten: \$(\"#kontrak-form #id_kabupaten\").val()
\t\t\t\t},
                dataType: 'json'
\t\t\t\t}).done(function (data) {
                if (data.success) {
                    \$.each(data.data, function (key, val) {
                        if (edit_id == val.kode_kantor)
\t\t\t\t\t\t\$(\"#kontrak-form #kode_kantor\").append('<option value=\"' + val.kode_kantor + '\" selected=\"selected\">' + val.nama_kantor + ' - ' + val.nama_kabupaten + '</option>');
                        else
\t\t\t\t\t\t\$(\"#kontrak-form #kode_kantor\").append('<option value=\"' + val.kode_kantor + '\">' + val.nama_kantor + ' - ' + val.nama_kabupaten + '</option>');
\t\t\t\t\t});
                    if (kode_kantor) {
                        \$(\"#kontrak-form #kode_kantor\").val(kode_kantor);
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
\t\t}
\t}
    function loadsubkomponen(id_subkomponen, id_aktifitas) {
        \$(\"#kontrak-form #id_subkomponen\").find('option').remove();
        \$(\"#kontrak-form #id_subkomponen\").append('<option value = \"\"> - SELECT SUB KOMPONEN - </option>');
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 35
        echo twig_escape_filter($this->env, site_url("komponen/getsubkomponen_by_komponen_ajax"), "html", null, true);
        echo "\",
            data: {
                id_komponen: \$(\"#kontrak-form #id_komponen\").val()
\t\t\t},
            dataType: 'json'
\t\t\t}).done(function (data) {
            if (data.success) {
                \$.each(data.data, function (key, val) {
                    \$(\"#kontrak-form #id_subkomponen\").append('<option value = \"' + val.id + '\" > ' + val.nama_subkomponen + ' </option>');
\t\t\t\t});
                if (id_subkomponen) {
                    \$(\"#kontrak-form #id_subkomponen\").val(id_subkomponen);
                    loadaktifitas(id_aktifitas);
\t\t\t\t}
\t\t\t}
            \$(\"#kontrak-form #id_subkomponen\").trigger('change');
\t\t});
\t}
    function loadaktifitas(id_aktifitas) {
        \$(\"#kontrak-form #id_aktifitas\").find('option').remove();
        \$(\"#kontrak-form #id_aktifitas\").append('<option value = \"\"> - SELECT AKTIFITAS - </option>');
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 58
        echo twig_escape_filter($this->env, site_url("aktifitas/list_subkomponen_aktifitas"), "html", null, true);
        echo "\",
            data: {
                id_subkomponen: \$(\"#kontrak-form #id_subkomponen\").val()
\t\t\t},
            dataType: 'json'
\t\t\t}).done(function (data) {
            if (data.success) {
                \$.each(data.data, function (key, val) {
                    \$(\"#kontrak-form #id_aktifitas\").append('<option value = \"' + val.id_subkomponen_aktifitas + '\" > ' + val.nama_aktifitas + ' </option>');
\t\t\t\t});
                if (id_aktifitas) {
                    \$(\"#kontrak-form #id_aktifitas\").val(id_aktifitas);
\t\t\t\t}
\t\t\t}
            \$(\"#kontrak-form #id_aktifitas\").trigger('change');
\t\t});
\t}
    function makeJson() {
        \$arr = JSON.parse(\$(\"#id_tobedeleted\").val());
        \$obj = {};
        for(\$i=0;\$i<\$arr.length;\$i++) {
            \$obj[\$i] = \$arr[\$i];
\t\t}
        \$(\"#id_tobedeleted\").val(JSON.stringify(\$obj));
\t}
    \$(document).on('ready', function () {
        \$(\"#kontrak-form\").validate({
            submitHandler: function (form) {
                if (\$(\"#table-list-komponen tbody tr\").size() == 0) {
                    bootbox.alert('<div class=\"alert alert-block alert-error fade in\"><h4 class=\"alert-titleing\" align=\"center\">Silakan Masukan Komponen Biaya Kontrak Terlebih Dahulu<br>Minimal Satu Biaya Kontrak</h4></div>');
                    //bootbox.alert(\"Silakan Masukan Komponen Biaya Kontrak Terlebih Dahulu<br>Minimal Satu Biaya Kontrak\");
\t\t\t\t\t} else {
                    var edit_id = \"";
        // line 90
        if (isset($context["kode_kantor"])) { $_kode_kantor_ = $context["kode_kantor"]; } else { $_kode_kantor_ = null; }
        echo twig_escape_filter($this->env, $_kode_kantor_, "html", null, true);
        echo "\";
                    if (edit_id == \"\")
\t\t\t\t\turl = \"";
        // line 92
        echo twig_escape_filter($this->env, site_url("kontrak/add"), "html", null, true);
        echo "\";
                    else
\t\t\t\t\turl = \"";
        // line 94
        echo twig_escape_filter($this->env, site_url("kontrak/edit"), "html", null, true);
        echo "\";
                    makeJson();
\t\t\t\t\t//alert(\$(\"#id_tobedeleted\").val());
                    \$.ajax({
                        type: \"POST\",
                        url: url,
                        data: \$(\"#kontrak-form\").serialize(),
                        dataType: 'json'
\t\t\t\t\t\t}).done(function (data) {
                        //alert(JSON.stringify(data));
                        if (data.success)
\t\t\t\t\t\tdocument.location.href = \"";
        // line 105
        echo twig_escape_filter($this->env, site_url("kontrak"), "html", null, true);
        echo "\";
\t\t\t\t\t});
\t\t\t\t}
                return false;
\t\t\t}
\t\t});
        \$(\".datepicker\").datepicker({
            dateFormat: \"dd-mm-yy\",
            changeYear: true,
            changeMonth: true
\t\t});
        \$(\"#kontrak-form #id_osp\").on('change', function () {
            loadkantor();
\t\t});
        \$(\"#kontrak-form #id_komponen\").on('change', function () {
            loadsubkomponen();
\t\t});
        \$(\"#kontrak-form #id_subkomponen\").on('change', function () {
            loadaktifitas();
\t\t});
        \$(\"#btn-tambah-item\").on('click', function () {
            if (\$(\"#id_osp\").val() == \"\") {
                bootbox.alert('<div class=\"alert alert-block alert-error fade in\"><h4 class=\"alert-titleing\" align=\"center\">Silakan Pilih OSP Terlebih Dahulu</h4></div>', function () {
                    return true;
\t\t\t\t});
                return false;
\t\t\t}
            if (\$(\"#kode_kantor\").val() == \"\") {
                bootbox.alert('<div class=\"alert alert-block alert-error fade in\"><h4 class=\"alert-titleing\" align=\"center\">Silakan Pilih Kantor Terlebih Dahulu</h4></div>', function () {
                    return true;
\t\t\t\t});
                return false;
\t\t\t}
            if (\$(\"#id_aktifitas\").val() == \"\" && \$(\"#nominal\").val() != \"\") {
                bootbox.alert('<div class=\"alert alert-block alert-error fade in\"><h4 class=\"alert-titleing\" align=\"center\">Silakan Pilih Aktifitas Terlebih Dahulu</h4></div>', function () {
                    return true;
\t\t\t\t});
                return false;
\t\t\t\t} else if (\$(\"#id_aktifitas\").val() != \"\" && \$(\"#nominal\").val() == \"\") {
                bootbox.alert('<div class=\"alert alert-block alert-error fade in\"><h4 class=\"alert-titleing\" align=\"center\">Silakan Isi Nominal Komponen Kontrak Dengan Benar</h4></div>', function () {
                    return true;
\t\t\t\t});
                return false;
\t\t\t\t} else if (\$(\"#id_aktifitas\").val() == \"\" && \$(\"#nominal\").val() == \"\") {
                bootbox.alert('<div class=\"alert alert-block alert-error fade in\"><h4 class=\"alert-titleing\" align=\"center\">Silakan Pilih Akitiftas dan Isi Nominal Komponen Kontrak Dengan Benar</h4></div>', function () {
                    return true;
\t\t\t\t});
                return false;
\t\t\t\t} else if (\$(\"#id_aktifitas\").val() != \"\" && \$(\"#nominal\").val() != \"\" && \$(\"#id_osp\").val() != \"\" && \$(\"#kode_kantor\").val() != \"\") {
                nominal = \$(\"#nominal\").val();
                nominal = nominal.replace(/,/g, '');
                start_periode = \$(\"#start_periode\").val();
\t\t\t\tif (start_periode) {
\t\t\t\t\tstart_periode_arr = start_periode.split('-');
\t\t\t\t\tstart_periode = start_periode_arr[2] + '-' + start_periode_arr[1] + '-' + start_periode_arr[0];
\t\t\t\t}
                finish_periode = \$(\"#finish_periode\").val();
\t\t\t\tif (finish_periode) {
\t\t\t\t\tfinish_periode_arr = finish_periode.split('-');
\t\t\t\t\tfinish_periode = finish_periode_arr[2] + '-' + finish_periode_arr[1] + '-' + finish_periode_arr[0];
\t\t\t\t}
                var subkom = \$(\"#kontrak-form #id_subkomponen option:selected\").text() == \"Activity\" ? \"\" : \$(\"#kontrak-form #id_subkomponen option:selected\").text();
                var info = '<input type=\"hidden\" name=\"info[]\" value=\"id_aktifitas=' + \$(\"#id_aktifitas\").val() + ']|[nominal=' + nominal + ']|[dari=' + \$(\"#dari\").val() + ']|[ke=' + \$(\"#ke\").val() + ']|[kode_kantor=' + \$(\"#kode_kantor\").val() + ']|[start_periode=' + start_periode + ']|[finish_periode=' + finish_periode + ']|[amandemen=' + \$(\"#amandemen\").val() + '\">';
                var index = \$(\"#table-list-komponen tbody tr\").size() + 1;
\t\t\t\$(\"#table-list-komponen tbody\").append('<tr><td class=\"center\">' + index + '</td><td>' + \$(\"#kontrak-form #id_komponen option:selected\").text() + '</td><td>' + subkom + '</td><td>' + \$(\"#kontrak-form #id_aktifitas option:selected\").text() + '</td><td>' + \$(\"#dari\").val() + '</td><td>' + \$(\"#ke\").val() + '</td><td>' + \$(\"#start_periode\").val() + '</td><td>' + \$(\"#finish_periode\").val() + '</td><td>' + \$(\"#amandemen\").val() + '</td><td>' + \$(\"#nominal\").val() + '</td><td>' + \$(\"#kontrak-form #kode_kantor option:selected\").text() + '</td><td><button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons pencil btn-ubah-komponen\"><i></i>Ubah</button> <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons bin btn-amandemen-komponen\"><i></i>Amandemen</button> <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons bin btn-hapus-komponen\"><i></i>Hapus</button>' + info + '</td></tr>');
                \$(\"#nominal\").val(0);
                \$(\"#dari\").val(\"\");
                \$(\"#ke\").val(\"\");
                \$(\"#id_aktifitas option:first\").prop('selected', true);
                \$(\"#id_osp option:first\").prop('selected', true);
                \$(\"#id_osp\").trigger('change');
\t\t\t}
\t\t});
        \$(\".btn-hapus-komponen\").live('click', function () {
            var \$tmp = [];
            \$tmp = JSON.parse(\$(\"#id_tobedeleted\").val());
            \$id_item_kontrak = \$(this).parent().parent().find(\"input[name=id_item_kontrak]\").val();
            if (\$id_item_kontrak && \$.inArray(\$id_item_kontrak,\$tmp)<0) {
                \$tmp.push(\$id_item_kontrak);
                \$(\"#id_tobedeleted\").val(JSON.stringify(\$tmp));
\t\t\t}
            \$(this).parent().parent().remove();
            var inc = 1;
            \$(\"#table-list-komponen tbody tr\").each(function () {
                \$(this).find('td:first').text(inc);
                inc++;
\t\t\t});
\t\t});
        \$(\".btn-ubah-komponen\").live('click', function () {
            \$(\"select#id_komponen\").val(\$(this).parent().parent().find(\"input[name=id_komponen]\").val());
            loadsubkomponen(\$(this).parent().parent().find(\"input[name=id_subkomponen]\").val(),\t\$(this).parent().parent().find(\"input[name=id_aktifitas]\").val());
            \$(\"select#id_osp\").val(\$(this).parent().parent().find(\"input[name=id_osp]\").val());
            loadkantor(\$(this).parent().parent().find(\"input[name=kode_kantor]\").val());
            \$(\"input#dari\").val(\$(this).parent().parent().find(\".dari\").html().trim());
            \$(\"input#ke\").val(\$(this).parent().parent().find(\".ke\").html().trim());
\t\t\t\$start_periode = \$(this).parent().parent().find(\".start_periode\").html().trim();
\t\t\tif (\$start_periode) {
\t\t\t\t\$(\"input#start_periode\").val(\$start_periode);
\t\t\t\tstart_periode_arr = \$start_periode.split('-');
\t\t\t\t\$start_periode = start_periode_arr[2] + '-' + start_periode_arr[1] + '-' + start_periode_arr[0];\t\t\t\t
\t\t\t}\t\t\t
\t\t\t\$finish_periode = \$(this).parent().parent().find(\".finish_periode\").html().trim();
\t\t\tif (\$finish_periode) {
\t\t\t\t\$(\"input#finish_periode\").val(\$finish_periode);
\t\t\t\tfinish_periode_arr = \$finish_periode.split('-');
\t\t\t\t\$finish_periode = finish_periode_arr[2] + '-' + finish_periode_arr[1] + '-' + finish_periode_arr[0];
\t\t\t}
\t\t\t\$(\"input#amandemen\").val(parseInt(\$(this).parent().parent().find(\".amandemen\").html().trim(),10));
            \$(\"input#nominal\").val(\$(this).parent().parent().find(\".nominal\").html().trim());
            \$(\"#btn-ubah-item\").show();
            \$(\"#btn-tambah-item\").hide();
            \$(\"#btn-amandemen-item\").hide();
\t\t\t\$(\"select#id_komponen\").prop(\"disabled\", false);
\t\t\t\$(\"select#id_subkomponen\").prop(\"disabled\", false); 
\t\t\t\$(\"select#id_aktifitas\").prop(\"disabled\", false);
\t\t\t\$(\"select#id_osp\").prop(\"disabled\", false);
\t\t\t\$(\"select#kode_kantor\").prop(\"disabled\", false);
\t\t\t\$(\"input#dari\").prop(\"readonly\", false);
\t\t\t\$(\"input#ke\").prop(\"readonly\", false);
            \$(\"#rownum\").val(\$(this).parent().parent().find(\"input[name=index]\").val());
            var \$tmp = [];
            \$tmp = JSON.parse(\$(\"#id_tobedeleted\").val());
            \$id_item_kontrak = \$(this).parent().parent().find(\"input[name=id_item_kontrak]\").val();
            if (\$id_item_kontrak && \$.inArray(\$id_item_kontrak,\$tmp)<0) {
                \$tmp.push(\$id_item_kontrak);
                \$(\"#id_tobedeleted\").val(JSON.stringify(\$tmp));
\t\t\t}/**/
\t\t});
        \$(\".btn-amandemen-komponen\").live('click', function () {
\t\t\t\$id_komponen = \$(this).parent().parent().find(\"input[name=id_komponen]\").val();
\t\t\t\$id_subkomponen = \$(this).parent().parent().find(\"input[name=id_subkomponen]\").val();
\t\t\t\$id_aktifitas = \$(this).parent().parent().find(\"input[name=id_aktifitas]\").val();
\t\t\t\$id_osp = \$(this).parent().parent().find(\"input[name=id_osp]\").val();
\t\t\t\$kode_kantor = \$(this).parent().parent().find(\"input[name=kode_kantor]\").val();
\t\t\t\$dari = \$(this).parent().parent().find(\".dari\").html().trim();
\t\t\t\$ke = \$(this).parent().parent().find(\".ke\").html().trim();
\t\t\t\$start_periode = \$(this).parent().parent().find(\".start_periode\").html().trim();
\t\t\tif (\$start_periode) {
\t\t\t\t\$(\"input#start_periode\").val(\$start_periode);
\t\t\t\tstart_periode_arr = \$start_periode.split('-');
\t\t\t\t\$start_periode = start_periode_arr[2] + '-' + start_periode_arr[1] + '-' + start_periode_arr[0];
\t\t\t}\t\t\t
\t\t\t\$finish_periode = \$(this).parent().parent().find(\".finish_periode\").html().trim();
\t\t\tif (\$finish_periode) {
\t\t\t\t\$(\"input#finish_periode\").val(\$finish_periode);
\t\t\t\tfinish_periode_arr = \$finish_periode.split('-');
\t\t\t\t\$finish_periode = finish_periode_arr[2] + '-' + finish_periode_arr[1] + '-' + finish_periode_arr[0];
\t\t\t}
\t\t\t\$amandemen = parseInt(\$(this).parent().parent().find(\".amandemen\").html().trim(),10);
\t\t\t\$nominal = \$(this).parent().parent().find(\".nominal\").html().trim();
            \$(\"select#id_komponen\").val(\$id_komponen); 
\t\t\t\$(\"select#id_komponen\").prop(\"disabled\", true);
            loadsubkomponen(\$id_subkomponen, \$id_aktifitas); 
\t\t\t\$(\"select#id_subkomponen\").prop(\"disabled\", true); 
\t\t\t\$(\"select#id_aktifitas\").prop(\"disabled\", true);
            \$(\"select#id_osp\").val(\$id_osp); 
\t\t\t\$(\"select#id_osp\").prop(\"disabled\", true);
            loadkantor(\$kode_kantor); 
\t\t\t\$(\"select#kode_kantor\").prop(\"disabled\", true);
            \$(\"input#dari\").val(\$dari); 
\t\t\t\$(\"input#dari\").prop(\"readonly\", true);
            \$(\"input#ke\").val(\$ke); 
\t\t\t\$(\"input#ke\").prop(\"readonly\", true);
            \$(\"input#amandemen\").val(\$amandemen+1); 
            \$(\"input#nominal\").val(\$nominal);
            \$(\"#btn-amandemen-item\").show();
            \$(\"#btn-tambah-item\").hide();
            \$(\"#btn-ubah-item\").hide();
            \$(\"#rownum\").val(\$(this).parent().parent().find(\"input[name=index]\").val());
            \$(\"#id\").val(\$(this).parent().parent().find(\"input[name=id]\").val());
\t\t\t\$(\"#info\").val('id_aktifitas=' + \$id_aktifitas + ']|[nominal=' + \$nominal.replace(/,/g, '') + ']|[dari=' + \$dari + ']|[ke=' + \$ke + ']|[kode_kantor=' + \$kode_kantor + ']|[start_periode=' + \$start_periode + ']|[finish_periode=' + \$finish_periode + ']|[amandemen=' + \$amandemen + ']|[amandemen_flg=1');
\t\t\tvar \$tmp = [];
            \$tmp = JSON.parse(\$(\"#id_tobedeleted\").val());
            \$id_item_kontrak = \$(this).parent().parent().find(\"input[name=id_item_kontrak]\").val();
            if (\$id_item_kontrak && \$.inArray(\$id_item_kontrak,\$tmp)<0) {
                \$tmp.push(\$id_item_kontrak);
                \$(\"#id_tobedeleted\").val(JSON.stringify(\$tmp));
\t\t\t}/**/
\t\t});
        \$(\"#btn-ubah-item\").live('click', function () {
            var \$rownum = \"tr#row-\" + \$(\"#rownum\").val();
            \$(\$rownum).find(\"td.nama_komponen\").html('<input type=\"hidden\" name=\"id_komponen\" value=\"' + \$(\"#id_komponen option:selected\").val() + '\">' + \$(\"#id_komponen option:selected\").text());
            \$(\$rownum).find(\"td.nama_subkomponen\").html('<input type=\"hidden\" name=\"id_subkomponen\" value=\"' + \$(\"#id_subkomponen option:selected\").val() + '\">' + \$(\"#id_subkomponen option:selected\").text());
            \$(\$rownum).find(\"td.nama_aktifitas\").html('<input type=\"hidden\" name=\"id_aktifitas\" value=\"' + \$(\"#id_aktifitas option:selected\").val() + '\">' + \$(\"#id_aktifitas option:selected\").text());
            \$(\$rownum).find(\"td.dari\").html(\$(\"input#dari\").val());
            \$(\$rownum).find(\"td.ke\").html(\$(\"input#ke\").val());
            \$(\$rownum).find(\"td.nominal\").html(\$(\"input#nominal\").val());
\t\t\tstart_periode = \$(\"input#start_periode\").val();
\t\t\tif(start_periode) {
\t\t\t\t\$(\$rownum).find(\"td.start_periode\").html(start_periode);
\t\t\t\tstart_periode_arr = start_periode.split('-');
\t\t\t\tstart_periode = start_periode_arr[2] + '-' + start_periode_arr[1] + '-' + start_periode_arr[0];
\t\t\t}
\t\t\tfinish_periode = \$(\"input#finish_periode\").val();
\t\t\tif(finish_periode) {
\t\t\t\t\$(\$rownum).find(\"td.finish_periode\").html(finish_periode);
\t\t\t\tfinish_periode_arr = finish_periode.split('-');
\t\t\t\tfinish_periode = finish_periode_arr[2] + '-' + finish_periode_arr[1] + '-' + finish_periode_arr[0];
\t\t\t}\t\t\t
\t\t\t\$(\$rownum).find(\"td.amandemen\").html(\$(\"input#amandemen\").val());
            \$(\$rownum).find(\"td.nama_kantor\").html('<input type=\"hidden\" name=\"id_osp\" value=\"' + \$(\"#id_osp option:selected\").val() + '\"><input type=\"hidden\" name=\"kode_kantor\" value=\"' + \$(\"#kode_kantor option:selected\").val() + '\">' + \$(\"#kode_kantor option:selected\").text());
            \$(\$rownum).find(\"input[name='info[]']\").val('id_aktifitas=' + \$(\"#id_aktifitas option:selected\").val() + ']|[nominal=' + \$(\"input#nominal\").val().replace(/,/g, '') + ']|[dari=' + \$(\"input#dari\").val() + ']|[ke=' + \$(\"input#ke\").val() + ']|[kode_kantor=' + \$(\"#kode_kantor option:selected\").val() + ']|[start_periode=' + start_periode + ']|[finish_periode=' + finish_periode + ']|[amandemen=' + \$(\"input#amandemen\").val());
            \$(\"select#id_komponen\").val('');
            \$(\"select#id_subkomponen\").val('');
            \$(\"select#id_aktifitas\").val('');
            \$(\"input#dari\").val('');
            \$(\"input#ke\").val('');
            \$(\"input#nominal\").val('');
\t\t\t\$(\"input#start_periode\").val('');
\t\t\t\$(\"input#finish_periode\").val('');
\t\t\t\$(\"input#amandemen\").val('');
            \$(\"select#id_osp\").val('');
            \$(\"select#kode_kantor\").val('');
            \$(\"#btn-tambah-item\").show();
            \$(\"#btn-ubah-item\").hide();
            \$(\"#btn-amandemen-item\").hide();
\t\t});
        \$(\"#btn-amandemen-item\").live('click', function () {
\t\t\tid = \$(\"#id\").val();
\t\t\tnominal = \$(\"#nominal\").val();
\t\t\tnominal = nominal.replace(/,/g, '');
\t\t\tstart_periode = \$(\"#start_periode\").val();
\t\t\tstart_periode_arr = start_periode.split('-');
\t\t\tstart_periode = start_periode_arr[2] + '-' + start_periode_arr[1] + '-' + start_periode_arr[0];
\t\t\tfinish_periode = \$(\"#finish_periode\").val();
\t\t\tfinish_periode_arr = finish_periode.split('-');
\t\t\tfinish_periode = finish_periode_arr[2] + '-' + finish_periode_arr[1] + '-' + finish_periode_arr[0];
\t\t\tvar subkom = \$(\"#kontrak-form #id_subkomponen option:selected\").text() == \"Activity\" ? \"\" : \$(\"#kontrak-form #id_subkomponen option:selected\").text();
\t\t\tvar info = '<input type=\"hidden\" name=\"info[]\" value=\"id_amandemen=' + \$(\"#id\").val() + ']|[id_aktifitas=' + \$(\"#id_aktifitas\").val() + ']|[nominal=' + nominal + ']|[dari=' + \$(\"#dari\").val() + ']|[ke=' + \$(\"#ke\").val() + ']|[kode_kantor=' + \$(\"#kode_kantor\").val() + ']|[start_periode=' + start_periode + ']|[finish_periode=' + finish_periode + ']|[amandemen=' + \$(\"#amandemen\").val() + ']|[amandemen_flg=0\">';
\t\t\tindex = parseInt(\$(\"#rownum\").val(),10);
\t\t\t\$rownum = \"tr#row-\" + index;
\t\t\t\$(\$rownum).after('<tr><td class=\"center\">' + (index+1) + '</td><td>' + \$(\"#kontrak-form #id_komponen option:selected\").text() + '</td><td>' + subkom + '</td><td>' + \$(\"#kontrak-form #id_aktifitas option:selected\").text() + '</td><td>' + \$(\"#dari\").val() + '</td><td>' + \$(\"#ke\").val() + '</td><td>' + \$(\"#start_periode\").val() + '</td><td>' + \$(\"#finish_periode\").val() + '</td><td>' + \$(\"#amandemen\").val() + '</td><td>' + \$(\"#nominal\").val() + '</td><td>' + \$(\"#kontrak-form #kode_kantor option:selected\").text() + '</td><td><button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons pencil btn-ubah-komponen\"><i></i>Ubah</button> <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons bin btn-amandemen-komponen\"><i></i>Amandemen</button> <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons bin btn-hapus-komponen\"><i></i>Hapus</button></td></tr>' + info);
\t\t\t\$(\$rownum).find(\"input[name='info[]']\").val(\$(\"#info\").val());
\t\t\t\$(\$rownum).find(\"button[class='btn-amandemen-komponen']\").hide();
\t\t\t\$(\"#table-list-komponen tbody tr\").each(function(i){
\t\t\t\t\$(this).find(\":first\").html(i+1);
\t\t\t});
            \$(\"select#id_komponen\").val('');
            \$(\"select#id_subkomponen\").val('');
            \$(\"select#id_aktifitas\").val('');
            \$(\"input#dari\").val('');
            \$(\"input#ke\").val('');
            \$(\"input#nominal\").val('');
\t\t\t\$(\"input#start_periode\").val('');
\t\t\t\$(\"input#finish_periode\").val('');
\t\t\t\$(\"input#amandemen\").val('');
            \$(\"select#id_osp\").val('');
            \$(\"select#kode_kantor\").val('');
            \$(\"#btn-tambah-item\").show();
            \$(\"#btn-ubah-item\").hide();
            \$(\"#btn-amandemen-item\").hide();
\t\t});
        \$(\"#nominal\").maskMoney({
            thousands: ',',
            decimal: '',
            allowZero: true,
            precision: 0
\t\t}); ";
        // line 362
        if (isset($context["mode"])) { $_mode_ = $context["mode"]; } else { $_mode_ = null; }
        if (($_mode_ == "edit")) {
            echo " \$(\"#id_osp\").trigger('change'); ";
        }
        // line 363
        echo "\t});
</script>
<form action=\"\" method=\"post\" id=\"kontrak-form\">
    <input type=\"hidden\" name=\"id_tobedeleted\" id=\"id_tobedeleted\" value=\"[]\">
    <div class=\"innerLR\">
        <div class=\"widget widget-gray widget-body-white\">
            <div class=\"widget-head\">
                <h4 class=\"heading\">Form Kontrak</h4>
\t\t\t</div>
            <div style=\"padding: 10px 0 0;\" class=\"widget-body\">
                <div class=\"row-fluid\">
                    <div class=\"span6\">
                        <div class=\"widget widget-4\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Kode Kontrak</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span12 required\" maxlength=\"9\" placeholder=\"Kode Kontrak\" name=\"kode_kontrak\" id=\"kode_kontrak\" ";
        // line 382
        if (isset($context["mode"])) { $_mode_ = $context["mode"]; } else { $_mode_ = null; }
        if (($_mode_ == "edit")) {
            echo " readonly=\"readonly\" ";
        }
        echo " value=\"";
        if (isset($context["kode_kontrak"])) { $_kode_kontrak_ = $context["kode_kontrak"]; } else { $_kode_kontrak_ = null; }
        echo twig_escape_filter($this->env, $_kode_kontrak_, "html", null, true);
        echo "\">
                                    <input type=\"hidden\" id=\"rownum\">
                                    <input type=\"hidden\" id=\"id\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"info\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
                        <div class=\"widget widget-4 row-fluid\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Tanggal Kontrak</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span12 required datepicker\" placeholder=\"Tanggal Kontrak\" name=\"tanggal_kontrak\" id=\"tanggal_kontrak\" readonly=\"readonly\" value=\"";
        // line 396
        if (isset($context["tanggal_kontrak"])) { $_tanggal_kontrak_ = $context["tanggal_kontrak"]; } else { $_tanggal_kontrak_ = null; }
        echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $_tanggal_kontrak_, "d-m-Y"), twig_date_format_filter($this->env, "now", "d-m-Y")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                    <div class=\"span6\">
                        <div class=\"widget widget-4\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Tanggal Kontrak Mulai</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span12 required datepicker\" placeholder=\"Tanggal Kontrak Mulai\" name=\"tanggal_kontrak_mulai\" id=\"tanggal_kontrak_mulai\" readonly=\"readonly\" value=\"";
        // line 409
        if (isset($context["tanggal_kontrak_mulai"])) { $_tanggal_kontrak_mulai_ = $context["tanggal_kontrak_mulai"]; } else { $_tanggal_kontrak_mulai_ = null; }
        echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $_tanggal_kontrak_mulai_, "d-m-Y"), twig_date_format_filter($this->env, "now", "d-m-Y")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
                        <div class=\"widget widget-4\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Tanggal Kontrak Akhir</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span12 required datepicker\" placeholder=\"Tanggal Kontrak Akhir\" name=\"tanggal_kontrak_akhir\" id=\"tanggal_kontrak_akhir\" readonly=\"readonly\" value=\"";
        // line 420
        if (isset($context["tanggal_kontrak_akhir"])) { $_tanggal_kontrak_akhir_ = $context["tanggal_kontrak_akhir"]; } else { $_tanggal_kontrak_akhir_ = null; }
        echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $_tanggal_kontrak_akhir_, "d-m-Y"), twig_date_format_filter($this->env, "now", "d-m-Y")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
    <div class=\"innerLR\">
        <div class=\"widget widget-gray widget-body-white\">
            <div class=\"widget-head\">
                <h4 class=\"heading\">Komponen Biaya Kontrak</h4>
\t\t\t</div>
            <div style=\"padding: 10px 0 0;\" class=\"widget-body\">
                <div class=\"row-fluid\">
                    <div class=\"span6\">
                        <div class=\"widget widget-4\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Komponen Biaya</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <select id=\"id_komponen\" class=\"span4\">
                                        <option value=\"\">SELECT KOMPONEN</option>
                                        ";
        // line 446
        if (isset($context["list_komponen"])) { $_list_komponen_ = $context["list_komponen"]; } else { $_list_komponen_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_komponen_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 447
            echo "                                        <option value=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id"), "html", null, true);
            echo "\">";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_komponen"), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 449
        echo "\t\t\t\t\t\t\t\t\t</select>
                                    <select id=\"id_subkomponen\" class=\"span4\">
                                        <option value=\"\">-SELECT SUB KOMPONEN-</option>
\t\t\t\t\t\t\t\t\t</select>
                                    <select id=\"id_aktifitas\" class=\"span4\">
                                        <option value=\"\">-SELECT AKTIFITAS-</option>
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
                        <div class=\"widget widget-4 row-fluid\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Start Periode</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span12 required datepicker\" placeholder=\"Start Periode\" name=\"start_periode\" id=\"start_periode\" value=\"";
        // line 466
        if (isset($context["start_periode"])) { $_start_periode_ = $context["start_periode"]; } else { $_start_periode_ = null; }
        echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $_start_periode_, "d-m-Y"), twig_date_format_filter($this->env, "now", "d-m-Y")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
                        <div class=\"widget widget-4 row-fluid\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Amandemen / Nominal</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span2\" placeholder=\"Amandemen\" id=\"amandemen\" value=\"1\">
                                    <input type=\"text\" class=\"span10\" placeholder=\"Nominal\" id=\"nominal\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                    <div class=\"span6\">
                        <div class=\"widget widget-4\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Dari / Ke</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span6\" placeholder=\"Dari\" id=\"dari\" value=\"";
        // line 491
        if (isset($context["dari"])) { $_dari_ = $context["dari"]; } else { $_dari_ = null; }
        echo twig_escape_filter($this->env, $_dari_, "html", null, true);
        echo "\">
                                    <input type=\"text\" class=\"span6\" placeholder=\"Ke\" id=\"ke\" value=\"";
        // line 492
        if (isset($context["ke"])) { $_ke_ = $context["ke"]; } else { $_ke_ = null; }
        echo twig_escape_filter($this->env, $_ke_, "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
                        <div class=\"widget widget-4 row-fluid\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Finish Periode</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <input type=\"text\" class=\"span12 required datepicker\" placeholder=\"Finish Periode\" name=\"finish_periode\" id=\"finish_periode\" value=\"";
        // line 503
        if (isset($context["finish_periode"])) { $_finish_periode_ = $context["finish_periode"]; } else { $_finish_periode_ = null; }
        echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $_finish_periode_, "d-m-Y"), twig_date_format_filter($this->env, "now", "d-m-Y")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
                        <div class=\"widget widget-4\">
                            <div class=\"widget-head\">
                                <h4 class=\"heading\">Kantor</h4>
\t\t\t\t\t\t\t</div>
                            <div class=\"separator\"></div>
                            <div class=\"row-fluid\">
                                <div class=\"controls\">
                                    <select id=\"id_osp\" class=\"span4 required\">
                                        <option value=\"\">--SELECT OSP--</option>
                                        ";
        // line 516
        if (isset($context["list_osp"])) { $_list_osp_ = $context["list_osp"]; } else { $_list_osp_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_list_osp_);
        foreach ($context['_seq'] as $context["key"] => $context["val"]) {
            // line 517
            echo "                                        <option value=\"";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id"), "html", null, true);
            echo "\" ";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            if (isset($context["id_osp"])) { $_id_osp_ = $context["id_osp"]; } else { $_id_osp_ = null; }
            if (($this->getAttribute($_val_, "id") == $_id_osp_)) {
                echo "selected=\"selected\" ";
            }
            echo ">";
            if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_val_, "osp_name"), "html", null, true);
            echo "</option>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 519
        echo "\t\t\t\t\t\t\t\t\t</select>
                                    <select id=\"kode_kantor\" class=\"span8\">
                                        <option value=\"\">--SELECT KANTOR--</option>
\t\t\t\t\t\t\t\t\t</select>
                                    <button class=\"btn btn-info btn-icon glyphicons inbox_in\" type=\"button\" id=\"btn-tambah-item\">
                                        <i></i>Tambah Item
\t\t\t\t\t\t\t\t\t</button>
                                    <button class=\"btn btn-info btn-icon glyphicons inbox_in\" type=\"button\" id=\"btn-ubah-item\" style=\"display:none\">
                                        <i></i>Ubah Item
\t\t\t\t\t\t\t\t\t</button>
                                    <button class=\"btn btn-info btn-icon glyphicons inbox_in\" type=\"button\" id=\"btn-amandemen-item\" style=\"display:none\">
                                        <i></i>Amandemen Item
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
                <div class=\"row-fluid\">
                    <table class=\"table table-bordered table-primary\" id=\"table-list-komponen\">
                        <thead>
                            <tr>
                                <th class=\"center\">No.</th>
                                <th>Komponen</th>
                                <th>Subkomponen</th>
                                <th>Aktifitas</th>
                                <th>Dari</th>
                                <th>Ke</th>
                                <th>Start Periode</th>
                                <th>Finish Periode</th>
                                <th>Amandemen</th>
                                <th>Nilai Kontrak</th>
                                <th>Kantor</th>
                                <th>&nbsp;</th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
                        <tbody>
                            ";
        // line 556
        if (isset($context["mode"])) { $_mode_ = $context["mode"]; } else { $_mode_ = null; }
        if (($_mode_ == "edit")) {
            echo " ";
            if (isset($context["info"])) { $_info_ = $context["info"]; } else { $_info_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_info_);
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 557
                echo "                            <tr id=\"row-";
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
                echo "\">
                                <td class=\"center\">
                                    <input type=\"hidden\" name=\"id\" value=\"";
                // line 559
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id"), "html", null, true);
                echo "\"> ";
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
                echo "                                    
\t\t\t\t\t\t\t\t</td>
                                <td class=\"nama_komponen\">
                                    <input type=\"hidden\" name=\"id_komponen\" value=\"";
                // line 562
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id_komponen"), "html", null, true);
                echo "\"> ";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_komponen"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
                                <td class=\"nama_subkomponen\">
                                    <input type=\"hidden\" name=\"id_subkomponen\" value=\"";
                // line 565
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id_subkomponen"), "html", null, true);
                echo "\"> ";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_subkomponen"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
                                <td class=\"nama_aktifitas\">
                                    <input type=\"hidden\" name=\"id_aktifitas\" value=\"";
                // line 568
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id_aktifitas"), "html", null, true);
                echo "\"> ";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_aktifitas"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
                                <td class=\"dari\">
                                    ";
                // line 571
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "dari"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
                                <td class=\"ke\">
                                    ";
                // line 574
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "ke"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
                                <td class=\"start_periode\">
                                    ";
                // line 577
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                if ($this->getAttribute($_val_, "start_periode")) {
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_val_, "start_periode"), "d-m-Y", 0), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($_val_, "periode_bulan") == null)) {
                    // line 579
                    echo "\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($_val_, "periode_bulan") > 9)) {
                    echo "01-";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_bulan"), "html", null, true);
                    echo "-";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_tahun"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($_val_, "periode_bulan") <= 9)) {
                    // line 580
                    echo "01-0";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_bulan"), "html", null, true);
                    echo "-";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_tahun"), "html", null, true);
                    echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 582
                echo "\t\t\t\t\t\t\t\t</td>
                                <td class=\"finish_periode\">
                                    ";
                // line 584
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                if ($this->getAttribute($_val_, "finish_periode")) {
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_val_, "finish_periode"), "d-m-Y", 0), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($_val_, "periode_bulan") == null)) {
                    // line 586
                    echo "\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($_val_, "periode_bulan") > 9)) {
                    echo "01-";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_bulan"), "html", null, true);
                    echo "-";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_tahun"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                } elseif (($this->getAttribute($_val_, "periode_bulan") <= 9)) {
                    // line 587
                    echo "01-0";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_bulan"), "html", null, true);
                    echo "-";
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "periode_tahun"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                }
                // line 589
                echo "\t\t\t\t\t\t\t\t</td>
                                <td class=\"amandemen\">
                                    ";
                // line 591
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                if ($this->getAttribute($_val_, "amandemen")) {
                    if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                    echo twig_escape_filter($this->env, $this->getAttribute($_val_, "amandemen"), "html", null, true);
                } else {
                    echo "1";
                }
                // line 592
                echo "\t\t\t\t\t\t\t\t</td>
                                <td class=\"nominal\">
                                    ";
                // line 594
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($_val_, "nominal"), 0, "", ","), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
                                <td class=\"nama_kantor\">
                                    <input type=\"hidden\" name=\"id_osp\" value=\"";
                // line 597
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id_osp"), "html", null, true);
                echo "\">
                                    <input type=\"hidden\" name=\"kode_kantor\" value=\"";
                // line 598
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "kode_kantor"), "html", null, true);
                echo "\"> ";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_kantor"), "html", null, true);
                echo " - ";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nama_kabupaten"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
                                <td>
                                    <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons pencil btn-ubah-komponen\">
                                        <i></i>Ubah
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t";
                // line 604
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                if (($this->getAttribute($_val_, "amandemen_flg") == 1)) {
                    // line 605
                    echo "                                    <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons bin btn-amandemen-komponen\">
                                        <i></i>Amandemen
\t\t\t\t\t\t\t\t\t</button>";
                } else {
                    // line 608
                    echo "                                    <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons bin btn-amandemen-komponen\">
                                        <i></i>Amandemen
\t\t\t\t\t\t\t\t\t</button>";
                }
                // line 611
                echo "                                    <button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons bin btn-hapus-komponen\">
                                        <i></i>Hapus
\t\t\t\t\t\t\t\t\t</button>
                                    <input type=\"hidden\" name=\"id_item_kontrak\" value=\"";
                // line 614
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id"), "html", null, true);
                echo "\">
                                    <input type=\"hidden\" name=\"info[]\" value=\"id_aktifitas=";
                // line 615
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "id_aktifitas"), "html", null, true);
                echo "]|[nominal=";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "nominal"), "html", null, true);
                echo "]|[dari=";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "dari"), "html", null, true);
                echo "]|[ke=";
                if (isset($context["val"])) { $_val_ = $context["val"]; } else { $_val_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_val_, "ke"), "html", null, true);
                echo "\">
                                    <input type=\"hidden\" name=\"index\" value=\"";
                // line 616
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_loop_, "index"), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 619
            echo " ";
        }
        // line 620
        echo "\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
                <div class=\"row-fluid\">
                    <div class=\"span12\">
                        <div class=\"widget widget-4\">
                            <div class=\"separator\"></div>
                            <button class=\"btn btn-primary cancel\" type=\"submit\">Simpan</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</form>";
    }

    public function getTemplateName()
    {
        return "modules/kontrak/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  934 => 620,  931 => 619,  912 => 616,  898 => 615,  893 => 614,  888 => 611,  883 => 608,  878 => 605,  875 => 604,  859 => 598,  854 => 597,  847 => 594,  843 => 592,  835 => 591,  831 => 589,  821 => 587,  809 => 586,  801 => 584,  797 => 582,  787 => 580,  775 => 579,  767 => 577,  760 => 574,  753 => 571,  743 => 568,  733 => 565,  723 => 562,  713 => 559,  706 => 557,  685 => 556,  646 => 519,  627 => 517,  622 => 516,  605 => 503,  590 => 492,  585 => 491,  556 => 466,  537 => 449,  524 => 447,  519 => 446,  489 => 420,  474 => 409,  457 => 396,  434 => 382,  413 => 363,  408 => 362,  148 => 105,  134 => 94,  129 => 92,  123 => 90,  88 => 58,  62 => 35,  33 => 9,  23 => 3,  19 => 1,);
    }
}
