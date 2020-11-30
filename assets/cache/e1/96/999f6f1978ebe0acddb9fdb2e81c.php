<?php

/* modules/transfer/form.html */
class __TwigTemplate_e196999f6f1978ebe0acddb9fdb2e81c extends Twig_Template
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
var jumlah_ditf = ";
        // line 2
        echo twig_escape_filter($this->env, ((array_key_exists("jumlah_tf", $context)) ? (_twig_default_filter((isset($context["jumlah_tf"]) ? $context["jumlah_tf"] : null), 0)) : (0)), "html", null, true);
        echo ";
function pilihfirm(kode)
{
\t\$.ajax({
\t  type: \"POST\",
\t  url: \"";
        // line 7
        echo twig_escape_filter($this->env, site_url("firm/getmatch_ajax"), "html", null, true);
        echo "\",
\t  data: {no_bukti:kode},
\t  success: function(data){
\t  },
\t  dataType: 'json'
\t}).done(function(data){
\t\tif(data.success)
\t\t{
\t\t\tjumlah_ditf = data.data.jumlah;
\t\t\t\$(\"#no_bukti\").val(data.data.no_bukti);
\t\t\t\$(\"#tanggal_transfer\").text(data.data.tanggal_transfer);
\t\t\t\$(\"#kode_jabatan\").text(data.data.nama_jabatan);
\t\t\t\$(\"#id_osp\").text(data.data.osp_name);
\t\t\t\$(\"#kantor\").text(data.data.nama_kantor+' - '+data.data.nama_kabupaten);
                        \$(\"#kode_kantor\").val(data.data.kode_kantor);
\t\t\t\$(\"#periode_bulan\").text(data.data.periode_bulan_string + ' / ' + data.data.periode_tahun);
                        \$(\"#periode_date\").val(data.data.periode_date);
\t\t\t\$(\"#bank_tujuan\").text(data.data.bank_tujuan);
\t\t\t\$(\"#ke_no_rek\").text(data.data.ke_no_rek);
\t\t\t\$(\"#nama_penerima\").text(data.data.nama_penerima);
\t\t\t\$('#transfer-modal-form').modal('hide');
\t\t}
\t});
}
function pilihitemdikontrak(id_item_kontrak,nominal)
{
\tvar subkom = \$(\"#id_subkomponen_choose option:selected\").text();
\tif(subkom==\"Activity\")
\t\tsubkom=\"\";
\t\$.ajax({
\t  type: \"POST\",
\t  url: \"";
        // line 38
        echo twig_escape_filter($this->env, site_url("komponen/ajax_get_match"), "html", null, true);
        echo "\",
\t  data: {id:\$(\"#kontrak-form #id_komponen_choose\").val()},
\t  success: function(data){
\t  },
\t  dataType: 'json'
\t}).done(function(data){
\t\tif(data.success)
\t\t{
\t\t\tvar read = (data.data.read_only==1?'readonly=\"readonly\"':'');
\t\t\tsubkom = subkom +\"(\"+\$(\"#id_aktifitas option:selected\").text()+\")\";
\t\t\tvar str_add = '<tr><td></td><td>'+\$(\"#id_komponen_choose option:selected\").text()+'</td><td>'+subkom+'</td><td>'+nominal+'</td><td><input type=\"text\" name=\"item_nominal[]\" class=\"item_nominal\" value=\"'+nominal+'\" '+read+'><input type=\"hidden\" name=\"id_item_kontrak[]\" value=\"'+id_item_kontrak+'\"/></td><td><button title=\"Hapus\" class=\"btn-delete-list btn btn-inverse btn-icon glyphicons bin\"><i></i>&nbsp;</button></td></tr>';
\t\t\t\$(\"#table-list-item tbody\").append(str_add);
\t\t\tinc=0;
\t\t\t\$(\"#table-list-item tbody tr\").each(function(){
\t\t\t\tinc++;
\t\t\t\t\$(this).find('td:first').text(inc);
\t\t\t});
\t\t}
\t\t\$(\"#kontrak-modal-form\").modal('hide');
\t});
}
\$(document).ready(function(){

\t\$.validator.addMethod(\"currency_min\", function(value, element, params) {
\t\tif(value==\"0\")
\t\t{
\t\t\treturn false;
\t\t}
\t\treturn true;
\t
\t}, \$.validator.format(\"Silakan Masukan Angka Diatas 0\"));
\t\$.validator.addMethod(\"total_sama\", function(value, element, params) {
\t\tvar s = \$(\"#jumlah\").val();
\t\tvar jumlah_diterima = s.replace(/,/g,'');
\t\t//s = \$(\"#total_all\").text();
\t\t//var total_semua = s.replace(/,/g,'');
\t\tif(jumlah_diterima!=jumlah_ditf)
\t\t{
\t\t\t//\$(this).addClass('red');
\t\t\t\$(element).addClass('red');
\t\t\treturn false;
\t\t}
\t\tconsole.log(element);
\t\t\$(element).removeClass('red');
\t\t//\$(this).removeClass('red');
\t\treturn true;
\t
\t}, \$.validator.format(\"Total Bukti Transfer Tidak Sama Dengan Jumlah Yang Diterima\"));
\t\$(\"#kontrak-form\").validate({
\t\trules:{
\t\t\tjumlah : {
\t\t\t\tcurrency_min : true,
\t\t\t\ttotal_sama : true
\t\t\t}
\t\t},
\t\tsubmitHandler: function(form) {
\t\t\tvar total_item = \$(\".item_nominal\").size();
\t\t\tif(total_item==0)
\t\t\t{
\t\t\t\tbootbox.alert('<div class=\"alert alert-block alert-error fade in\"><h4 class=\"alert-titleing\" align=\"center\">Silakan Pilih Komponen Biaya Minimal Satu</h4></div>', function() {
\t\t\t\treturn true;\t\t  
\t\t\t});
\t\t\treturn false;
\t\t\t}
\t\t\tvar edit_id= \"";
        // line 102
        echo twig_escape_filter($this->env, (isset($context["mode"]) ? $context["mode"] : null), "html", null, true);
        echo "\";
\t\t\tif(edit_id==\"\")
\t\t\t\turl = \"";
        // line 104
        echo twig_escape_filter($this->env, site_url("transfer/add"), "html", null, true);
        echo "\";
\t\t\telse
\t\t\t\turl = \"";
        // line 106
        echo twig_escape_filter($this->env, site_url("transfer/edit/"), "html", null, true);
        echo "\"+\$(\"#no_bukti\").val();
\t\t\tvar test = \$(\"#kontrak-form #jumlah\").val();
\t\t\t\$(\"#kontrak-form #jumlah\").val(test.replace(/,/g,''));
\t\t\t\$(\".item_nominal\").each(function(){
\t\t\t\tvar ts = \$(this).val();
\t\t\t\t\$(this).val(ts.replace(/,/g,''));
\t\t\t});
\t\t\t\$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: url,
\t\t\t  data: \$(\"#kontrak-form\").serialize(),
\t\t\t  dataType: 'json'
\t\t\t}).done(function(data){
\t\t\t\tif(data.success)
\t\t\t\tdocument.location.href=\"";
        // line 120
        echo twig_escape_filter($this->env, site_url("transfer"), "html", null, true);
        echo "\";
\t\t\t});
\t\t\treturn false;
\t\t}
\t});
\t\$(\".datepicker\").datepicker({dateFormat:\"dd-mm-yy\",changeYear:true,changeMonth:true});
\t\$(\"#jumlah\").maskMoney({thousands:',', decimal:'', allowZero:true,precision:0});
\t\$(\"#checkfirm\").on('click',function(){
\t\t\$(\"#transfer-modal-form\").modal('show');
\t});
\tvar table = \$(\"#firm-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 133
        echo twig_escape_filter($this->env, site_url("firm/listing"), "html", null, true);
        echo "\",
\t\tfnServerParams:function(aoData){
\t\t\taoData.push({\"name\":\"kode_kantor\", \"value\":\"";
        // line 135
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["__SESSION"]) ? $context["__SESSION"] : null), "bop_last"), "id_kantor"), "html", null, true);
        echo "\"});
\t\t},
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\tvar url = \"";
        // line 139
        echo twig_escape_filter($this->env, site_url("firm/edit/"), "html", null, true);
        echo "\"+full[0];
\t\t\t\treturn '<button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons star\" title=\"Pilih\" onclick=\"pilihfirm(\\''+full[0]+'\\')\"><i></i>Pilih</button>';
\t\t\t},bSearchable:false,bSearchable:false,aTargets:[10]
\t\t\t},
\t\t\t{bVisible:false,aTargets:[7]},
\t\t\t{mRender : function(data, type, full){
\t\t\t\treturn full[10];
\t\t\t},bSearchable:false,bSearchable:false,aTargets:[9]
\t\t\t},
       ]
\t});
\t
\t\$('#transfer-modal-form').on('show.bs.modal', function () {
\t\t table.fnReloadAjax();
    });
\t\$(\"#kontrak-form #id_komponen_choose\").on('change',function(){
\t\t\$(\"#kontrak-form #id_subkomponen_choose\").find('option').remove();
\t\t\$(\"#kontrak-form #id_subkomponen_choose\").append('<option value=\"\">--SELECT SUB KOMPONEN--</option>');
\t\t\$.ajax({
\t\t  type: \"POST\",
\t\t  url: \"";
        // line 159
        echo twig_escape_filter($this->env, site_url("komponen/getsubkomponen_by_komponen_ajax"), "html", null, true);
        echo "\",
\t\t  data: {id_komponen:\$(\"#kontrak-form #id_komponen_choose\").val()},
\t\t  dataType: 'json'
\t\t}).done(function(data){
\t\t\tif(data.success)
\t\t\t{
\t\t\t\t\$.each(data.data,function(key,val){
\t\t\t\t\t\$(\"#kontrak-form #id_subkomponen_choose\").append('<option value=\"'+val.id+'\">'+val.nama_subkomponen+'</option>');
\t\t\t\t});
\t\t\t}
\t\t\t\$(\"#kontrak-form #id_subkomponen_choose\").trigger('change');
\t\t});
\t});
\t\$(\"#id_subkomponen_choose\").on('change',function(){
\t\tif(\$(this).val()!=\"\")
\t\t\t\$(\"#checkkontrak\").removeClass('hidden');
\t\telse
\t\t\t\$(\"#checkkontrak\").addClass('hidden');
\t});
\tvar tables = \$(\"#kontrak-list-table\").dataTable({
\t\t\"bProcessing\": true,
        \t\"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 181
        echo twig_escape_filter($this->env, site_url("kontrak/getkontrak_rekap_bukti_transfer_ajax_list"), "html", null, true);
        echo "\",
\t\tfnServerParams: function(aoData){
\t\t\taoData.push({\"name\":\"id_aktifitas\", \"value\":\$(\"#id_aktifitas\").val()});
\t\t\taoData.push({\"name\":\"id_subkomponen\", \"value\":\$(\"#id_subkomponen_choose\").val()});
\t\t\taoData.push({\"name\":\"kode_kantor\", \"value\":\$(\"#kode_kantor\").val()});
                        aoData.push({\"name\":\"periode_date\", \"value\":\$(\"#periode_date\").val()});
\t\t},
\t\t\"aoColumnDefs\": [{
\t\t\tmRender : function(data, type, full){
\t\t\t\tvar url = \"";
        // line 190
        echo twig_escape_filter($this->env, site_url("firm/edit/"), "html", null, true);
        echo "\"+full[0];
\t\t\t\treturn '<button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons star\" title=\"Pilih\" onclick=\"pilihitemdikontrak(\\''+full[5]+'\\',\\''+full[2]+'\\')\"><i></i>Pilih</button>';
\t\t\t}, bSearchable:false,bSearchable:false,aTargets:[5]
\t\t}]
\t});
\t\$('#kontrak-modal-form').on('show.bs.modal', function(){
\t\t\$(\"#id_aktifitas\").find('option').remove();
\t\t\$(\"#id_aktifitas\").append('<option value=\"\">--PILIH AKTIFITAS--</option>');
\t\t \$.ajax({
\t\t  type: \"POST\",
\t\t  url: \"";
        // line 200
        echo twig_escape_filter($this->env, site_url("aktifitas/list_subkomponen_aktifitas"), "html", null, true);
        echo "\",
\t\t  data: {id_subkomponen:\$(\"#id_subkomponen_choose\").val()},
\t\t  success: function(){},
\t\t  dataType: 'json'
\t\t}).done(function(data){
\t\t\tif(data.success)
\t\t\t{
\t\t\t\t\$.each(data.data,function(key,val){
\t\t\t\t\t\$(\"#id_aktifitas\").append('<option value=\"'+val.id+'\">'+val.nama_aktifitas+'</option>');
\t\t\t\t});
\t\t\t\ttables.fnReloadAjax();
\t\t\t}
\t\t});
\t});
\t\$(\"#id_aktifitas\").on('change',function(){
\t\ttables.fnReloadAjax();
\t});
\t\$(\".item_nominal\").live('change',function(){
\t\tvar val = \$(this).val();
\t\tval = val.replace(/,/g,'');
\t\tvar num = parseFloat(val);
\t\t\$(this).val(num.toMoney(0,'.',','));
\t\t
\t\t total = 0;
\t\t \$(\".item_nominal\").each(function(){
\t\t\t var val = \$(this).val();
\t\t\t val = val.replace(/,/g,'');
\t\t\t var num = parseFloat(val);
\t\t\ttotal = total + num;
\t\t });
\t\t \$(\"#total_all\").text(total.toMoney(0,'.',','));
\t});
\t\$(\".item_nominal\").live('keyup',function(){
\t\t\$(\".item_nominal\").trigger('change');
\t});
\t\$('#kontrak-modal-form').on('hide.bs.modal', function () {
\t\t var total = 0;
\t\t \$(\".item_nominal\").each(function(){
\t\t\t var val = \$(this).val();
\t\t\t val = val.replace(/,/g,'');
\t\t\t var num = parseFloat(val);
\t\t\ttotal = total + num;
\t\t });
\t\t \$(\"#total_all\").text(total.toMoney(0,'.',','));
    });
\t\$(\".btn-delete-list\").live('click',function(){
\t\t\$(this).parent().parent().remove();
\t\t var total = 0;
\t\t \$(\".item_nominal\").each(function(){
\t\t\t var val = \$(this).val();
\t\t\t val = val.replace(/,/g,'');
\t\t\t var num = parseFloat(val);
\t\t\ttotal = total + num;
\t\t });
\t\t \$(\"#total_all\").text(total.toMoney(0,'.',','));
\t});
\ttotal=0;
\t\$(\".item_nominal\").each(function(){
\t\t var val = \$(this).val();
\t\t val = val.replace(/,/g,'');
\t\t var num = parseFloat(val);
\t\ttotal = total + num;
\t });
\t \$(\"#total_all\").text(total.toMoney(0,'.',','));
})
// \$(document).on('ready',function(){
// });
</script>
<style>
input[type=\"text\"].red
{
\tcolor:#900;
}
</style>
<div class=\"modal hide fade\" id=\"transfer-modal-form\" style=\"width:90%; left:25%;\">
  <div class=\"modal-header\">
    <h3>Data Transfer Firm</h3>
  </div>
  <div class=\"modal-body\">
    <p>
    \t<div class=\"widget widget-4\">
        \t<p>
            \t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"firm-table\" >
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>No Bukti Transfer</th>
                      <th>Kode Kantor</th>
                      <th>Kantor</th>
                      <th>Tanggal Transfer</th>
                      <th>Jabatan</th>
                      <th>Bank Penerima</th>
                      <th>No Rekening Penerima</th>
                      <th>Nama Penerima</th>
                      <th>Jumlah Transfer</th>
                      <th>Periode</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t
\t\t\t\t</tbody>
                
\t\t\t</table>
            </p>
        </div>
    </p>
  </div>
  <div class=\"modal-footer\">
    <button type=\"button\" class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

<div class=\"modal hide fade\" id=\"kontrak-modal-form\" style=\"width:90%; left:27%;\">
  <div class=\"modal-header\">
    <h3>Data Kontrak</h3>
  </div>
  <div class=\"modal-body\">
    <p>
    \t<select id=\"id_aktifitas\">
        \t<option value=\"\">--PILIH AKTIFITAS--</option>
        </select>
    \t<div class=\"widget widget-4\">
        \t<p>
            \t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"kontrak-list-table\" >
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>Kode Kontrak</th>
                      <th>Aktifitas</th>
                      <th>Nominal</th>
                      <th>Dari</th>
                      <th>Ke</th>
\t\t\t\t\t  <th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t
\t\t\t\t</tbody>
\t\t\t</table>
            </p>
        </div>
    </p>
  </div>
  <div class=\"modal-footer\">
    <button type=\"button\" class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>

<form action=\"\" method=\"post\" id=\"kontrak-form\">
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Form Rekapitulasi Bukti Transfer</h4>
\t\t</div>
\t\t<div style=\"padding: 10px 0 0;\" class=\"widget-body\">
\t\t\t
\t\t\t<div class=\"row-fluid\">
                <div class=\"span6\">
                
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">No Bukti Transfer</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <input type=\"text\" class=\"span9 required\" placeholder=\"No Bukti Transfer\" name=\"no_bukti\" id=\"no_bukti\" readonly=\"readonly\" value=\"";
        // line 363
        echo twig_escape_filter($this->env, (isset($context["no_bukti"]) ? $context["no_bukti"] : null), "html", null, true);
        echo "\">
                                ";
        // line 364
        if ((((isset($context["mode"]) ? $context["mode"] : null) != "edit") && ((isset($context["mode"]) ? $context["mode"] : null) != "detil"))) {
            echo "<button type=\"button\" class=\"btn btn-inverse btn-icon glyphicons new_window span3 pull-right\" id=\"checkfirm\"><i></i>Pilih</button>";
        }
        // line 365
        echo "                            </div>
                        </div>
                    </div>
                    
                    <div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Tanggal Transfer</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                            \t<div class=\"span12 input img-polaroid\" id=\"tanggal_transfer\">
                                ";
        // line 375
        echo twig_escape_filter($this->env, (isset($context["tanggal_transfer"]) ? $context["tanggal_transfer"] : null), "html", null, true);
        echo "
                                </div>
                            </div>
                        </div>
                    </div>
                    
                \t<div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Jabatan</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <div class=\"span12 input img-polaroid\" id=\"kode_jabatan\">
                                ";
        // line 387
        echo twig_escape_filter($this->env, (isset($context["nama_jabatan"]) ? $context["nama_jabatan"] : null), "html", null, true);
        echo "
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Kantor</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <div class=\"span4 input img-polaroid\" id=\"id_osp\">
                                ";
        // line 398
        echo twig_escape_filter($this->env, (isset($context["osp_name"]) ? $context["osp_name"] : null), "html", null, true);
        echo "
                                </div>
                                <div class=\"span8 input img-polaroid\" id=\"kantor\">
                                ";
        // line 401
        echo twig_escape_filter($this->env, (isset($context["kantor"]) ? $context["kantor"] : null), "html", null, true);
        echo "
                                </div>
                            </div>
                        </div><input type=\"hidden\" name=\"kode_kantor\" id=\"kode_kantor\" value=\"";
        // line 404
        echo twig_escape_filter($this->env, (isset($context["kode_kantor"]) ? $context["kode_kantor"] : null), "html", null, true);
        echo "\"/>
                    </div>
                    <div class=\"widget widget-4 row-fluid\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Periode</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                            <div class=\"controls\">
                                <div class=\"span12 input img-polaroid\" id=\"periode_bulan\">
                                ";
        // line 412
        echo twig_escape_filter($this->env, (isset($context["periode"]) ? $context["periode"] : null), "html", null, true);
        echo "
                                </div>
                            </div>
                        </div><input type=\"text\" name=\"periode_date\" id=\"periode_date\" value=\"";
        // line 415
        echo twig_escape_filter($this->env, (isset($context["periode_date"]) ? $context["periode_date"] : null), "html", null, true);
        echo "\"/>
                    </div>
                </div>
                <div class=\"span6\">
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Bank Penerima</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<div class=\"span12 input img-polaroid\" id=\"bank_tujuan\">
                                ";
        // line 425
        echo twig_escape_filter($this->env, (isset($context["bank_penerima"]) ? $context["bank_penerima"] : null), "html", null, true);
        echo "
                                </div>
                            </div>
                        </div>
                    </div>
                \t<div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Nomor Rekening Penerima</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<div class=\"span12 input img-polaroid\" id=\"ke_no_rek\">
                                ";
        // line 436
        echo twig_escape_filter($this->env, (isset($context["rekening_penerima"]) ? $context["rekening_penerima"] : null), "html", null, true);
        echo "
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Nama Penerima</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
                            \t<div class=\"span12 input img-polaroid\" id=\"nama_penerima\">
                                ";
        // line 447
        echo twig_escape_filter($this->env, (isset($context["nama_penerima"]) ? $context["nama_penerima"] : null), "html", null, true);
        echo "
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Diterima Tanggal</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
\t                            <input type=\"text\" class=\"span12 required datepicker\" placeholder=\"Nama Penerima\" name=\"tanggal_diterima\" id=\"tanggal_diterima\" value=\"";
        // line 457
        echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, (isset($context["tanggal_diterima"]) ? $context["tanggal_diterima"] : null), "d-m-Y"), twig_date_format_filter($this->env, "now", "d-m-Y")), "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>
                    <div class=\"widget widget-4\">
                        <div class=\"widget-head\"><h4 class=\"heading\">Jumlah Diterima</h4></div>
                        <div class=\"separator\"></div>
                        <div class=\"row-fluid\">
                        \t<div class=\"controls\">
\t                            <input type=\"text\" class=\"span12 required\" placeholder=\"Jumlah Diterima\" name=\"jumlah\" id=\"jumlah\" value=\"";
        // line 466
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["jumlah_diterima"]) ? $context["jumlah_diterima"] : null), 0, "", ","), "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>
                </div>
\t\t\t</div>
\t\t\t
\t\t</div>\t
\t</div>
</div>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Komponen Biaya</h4>
\t\t</div>
\t\t<div style=\"padding: 10px 0 0;\" class=\"widget-body\">
\t\t\t";
        // line 482
        if (((isset($context["mode"]) ? $context["mode"] : null) != "detil")) {
            // line 483
            echo "\t\t\t<div class=\"row-fluid\">
            \t<select id=\"id_komponen_choose\" class=\"span4\">
                \t<option value=\"\">--PILIH KOMPONEN BIAYA--</option>
                    ";
            // line 486
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["list_komponen"]) ? $context["list_komponen"] : null));
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 487
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "nama_komponen"), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 489
            echo "                </select>
                <select id=\"id_subkomponen_choose\" class=\"span6\">
                    <option value=\"\">--PILIH SUB KOMPONEN--</option>
                </select>
                <button id=\"checkkontrak\" data-toggle=\"modal\" data-target=\"#kontrak-modal-form\" class=\"btn btn-inverse btn-icon glyphicons new_window span2 pull-right hidden\" type=\"button\"><i></i>Pilih</button>
            </div>
            ";
        }
        // line 496
        echo "            <div class=\"row-fluid\">
            \t<table class=\"table table-bordered table-primary table-condensed\" id=\"table-list-item\">
                    <thead>
                        <tr>
                            <th class=\"center\">No.</th>
                            <th>Komponen</th>
                            <th>Subkomponen / Aktifitas</th>
                            <th>Nilai Kontrak</th>
                            <th>Alokasi Dana</th>
                            ";
        // line 505
        if (((isset($context["mode"]) ? $context["mode"] : null) != "detil")) {
            // line 506
            echo "                            <th>&nbsp;</th>
                            ";
        }
        // line 508
        echo "                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 511
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list_item"]) ? $context["list_item"] : null));
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
            // line 512
            echo "                        <tr>
                            <td class=\"center\">";
            // line 513
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
            echo ". </td>
                            <td>";
            // line 514
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "nama_komponen"), "html", null, true);
            echo "</td>
                            <td>";
            // line 515
            if (($this->getAttribute((isset($context["val"]) ? $context["val"] : null), "nama_subkomponen") != "Activity")) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "nama_subkomponen"), "html", null, true);
            }
            echo "(";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "nama_aktifitas"), "html", null, true);
            echo ")</td>
                            <td>";
            // line 516
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "nominal_kontrak"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td><!--<input type=\"text\" name=\"item_nominal[]\" class=\"item_nominal\" value=\"";
            // line 517
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "jumlah"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["val"]) ? $context["val"] : null), "read_only") == 1)) {
                echo "readonly=\"readonly\"";
            }
            echo ">-->
\t\t\t\t\t\t\t\t<input type=\"text\" name=\"item_nominal[]\" class=\"item_nominal\" value=\"";
            // line 518
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "jumlah"), "html", null, true);
            echo "\"
\t\t\t\t\t\t\t\t\t";
            // line 519
            if (($this->getAttribute($this->getAttribute((isset($context["__SESSION"]) ? $context["__SESSION"] : null), "bop_last"), "id_group") != 5)) {
                echo "readonly=\"readonly\" ";
            }
            echo ">
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"id_item_kontrak[]\" value=\"";
            // line 520
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["val"]) ? $context["val"] : null), "id_item_kontrak"), "html", null, true);
            echo "\" /></td>
                            ";
            // line 521
            if (((isset($context["mode"]) ? $context["mode"] : null) != "detil")) {
                // line 522
                echo "                            <td><button title=\"Hapus\" class=\"btn-delete-list btn btn-inverse btn-icon glyphicons bin\"><i></i>&nbsp;</button></td>
                            ";
            }
            // line 524
            echo "                        </tr>
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
        // line 526
        echo "                    </tbody>
                    <tfoot>
      \t\t\t\t\t<td colspan=\"4\"><b>Total</b></td>          \t
                        <td colspan=\"2\" align=\"left\" id=\"total_all\">0</td>
\t                </tfoot>
                </table>
            </div>
            <div class=\"row-fluid\">
            \t<div class=\"span12\">
                \t<div class=\"widget widget-4\">
                    \t<div class=\"separator\"></div>
                        <input type=\"hidden\" name=\"id\" value=\"";
        // line 537
        echo twig_escape_filter($this->env, (isset($context["id_transfer"]) ? $context["id_transfer"] : null), "html", null, true);
        echo "\" />
                        ";
        // line 538
        if (((isset($context["mode"]) ? $context["mode"] : null) != "detil")) {
            // line 539
            echo "            \t<button class=\"btn btn-block btn-primary\" type=\"submit\">Simpan</button>
                ";
        }
        // line 541
        echo "                \t</div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>";
    }

    public function getTemplateName()
    {
        return "modules/transfer/form.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  747 => 541,  743 => 539,  741 => 538,  737 => 537,  724 => 526,  709 => 524,  705 => 522,  703 => 521,  699 => 520,  693 => 519,  689 => 518,  681 => 517,  677 => 516,  669 => 515,  665 => 514,  661 => 513,  658 => 512,  641 => 511,  636 => 508,  632 => 506,  630 => 505,  619 => 496,  610 => 489,  599 => 487,  595 => 486,  590 => 483,  588 => 482,  569 => 466,  557 => 457,  544 => 447,  530 => 436,  516 => 425,  503 => 415,  497 => 412,  486 => 404,  480 => 401,  474 => 398,  460 => 387,  445 => 375,  433 => 365,  429 => 364,  425 => 363,  259 => 200,  246 => 190,  234 => 181,  209 => 159,  186 => 139,  179 => 135,  174 => 133,  158 => 120,  141 => 106,  136 => 104,  131 => 102,  64 => 38,  30 => 7,  22 => 2,  19 => 1,);
    }
}
