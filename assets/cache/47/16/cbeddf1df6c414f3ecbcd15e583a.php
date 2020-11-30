<?php

/* modules/komponen/list_subkomponen.html */
class __TwigTemplate_4716cbeddf1df6c414f3ecbcd15e583a extends Twig_Template
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
var komponen_url_transaction = \"";
        // line 2
        echo twig_escape_filter($this->env, site_url("komponen/subkomponen_add"), "html", null, true);
        echo "\";
function editsubkomponen(id,prop)
{
\tkomponen_url_transaction = \"";
        // line 5
        echo twig_escape_filter($this->env, site_url("komponen/subkomponen_edit"), "html", null, true);
        echo "\";
\t\$(\"#komponen-form #id\").val(id);
\t\$(\"#komponen-form #nama_subkomponen\").val(prop);
\t\$(\"#komponen-modal-form\").modal('show');
}
function deletesubkomponen(idprop)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 17
        echo twig_escape_filter($this->env, site_url("komponen/subkomponen_delete"), "html", null, true);
        echo "\",
\t\t\t  data: {id:idprop},
\t\t\t  success: function(data){
\t\t\t\t  \$(\"#komponen-table\").dataTable().fnReloadAjax();
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t})
\t  }
\t}); 
}
function viewactivity(id)
{
\tgetaktifitaslist(id);
\t\$(\"#aktifitas-modal-form\").modal('show');
}
function deletesubkomponenaktifitas(idsubkomponen,idaktifitas)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 39
        echo twig_escape_filter($this->env, site_url("komponen/deletesubkomponenaktifitas"), "html", null, true);
        echo "\",
\t\t\t  data: {id:idaktifitas},
\t\t\t  success: function(data){
\t\t\t  },
\t\t\t  error : function(){
\t\t\t\t  \$(\"#komponen-modal-form .alert-error span\").text(\"Your Data Transaction Failed, Please Contact Your Administrator\");
\t\t\t\t  \$(\"#komponen-modal-form .alert-error\").removeClass('hide');
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t}).done(function(data){
\t\t\t\tgetaktifitaslist(idsubkomponen);
\t\t\t});
\t  }
\t}); 
}
function getaktifitaslist(id)
{
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 58
        echo twig_escape_filter($this->env, site_url("aktifitas/getaktifitas_notin_subkomponen"), "html", null, true);
        echo "\",
\t\tdata: {id_subkomponen:id},
\t\tsuccess: function(data){
\t\t},
\t\tdataType: 'json'
\t}).done(function(data){
\t\t\$(\"#aktifitas-form #id_aktifitas\").find('option').remove();
\t\t\$(\"#aktifitas-form #id_aktifitas\").append('<option value=\"\">--SELECT AKTIFITAS--</option>');
\t\t\$.each(data.data,function(key,val){
\t\t\t\$(\"#aktifitas-form #id_aktifitas\").append('<option value=\"'+val.id+'\">'+val.nama_aktifitas+'</option>');
\t\t});
\t\t\$(\"#aktifitas-form #id_subkomponen\").val(id);
\t\t\$.ajax({
\t\t\ttype: \"POST\",
\t\t\turl: \"";
        // line 72
        echo twig_escape_filter($this->env, site_url("aktifitas/list_subkomponen_aktifitas"), "html", null, true);
        echo "\",
\t\t\tdata: {id_subkomponen:id},
\t\t\tsuccess: function(data){
\t\t\t},
\t\t\tdataType: 'json'
\t\t}).done(function(output){
\t\t\t\$(\"#aktifitas-form #aktifitas-table tbody\").find('tr').remove();
\t\t\tvar inc = 1;
\t\t\t\$.each(output.data,function(key,val){
\t\t\t\t\$(\"#aktifitas-form #aktifitas-table tbody\").append('<tr><td class=\"center\">'+inc+'</td><td>'+val.nama_aktifitas+'</td><td><button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletesubkomponenaktifitas(\\''+id+'\\',\\''+val.id_subkomponen_aktifitas+'\\')\"><i></i>Hapus</button></td></tr>');
\t\t\t\tinc++;
\t\t\t});
\t\t});
\t});
\t
}
function p(id)
{
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 92
        echo twig_escape_filter($this->env, site_url("komponen/ajax_set_sub_komp"), "html", null, true);
        echo "\",
\t\tdata: {ids:id,mode:'p'},
\t\tsuccess: function(data){
\t\t\t\$(\"#komponen-table\").dataTable().fnReloadAjax();
\t\t},
\t\tdataType: 'json'
\t});
}
function k(id)
{
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 104
        echo twig_escape_filter($this->env, site_url("komponen/ajax_set_sub_komp"), "html", null, true);
        echo "\",
\t\tdata: {ids:id,mode:'k'},
\t\tsuccess: function(data){
\t\t\t\$(\"#komponen-table\").dataTable().fnReloadAjax();
\t\t},
\t\tdataType: 'json'
\t});
}
function a(id)
{
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 116
        echo twig_escape_filter($this->env, site_url("komponen/ajax_set_sub_komp"), "html", null, true);
        echo "\",
\t\tdata: {ids:id,mode:'a'},
\t\tsuccess: function(data){
\t\t\t\$(\"#komponen-table\").dataTable().fnReloadAjax();
\t\t},
\t\tdataType: 'json'
\t});
}
\$(document).on('ready',function(){
\tvar table = \$(\"#komponen-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 128
        echo twig_escape_filter($this->env, site_url("komponen/listing_subkomponen/"), "html", null, true);
        if (isset($context["id_komponen"])) { $_id_komponen_ = $context["id_komponen"]; } else { $_id_komponen_ = null; }
        echo twig_escape_filter($this->env, $_id_komponen_, "html", null, true);
        echo "\",
\t\t\"sPaginationType\": \"bootstrap\",
\t\t\"sDom\": \"<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>\",
\t\t\"oLanguage\": {
\t\t\t\"sLengthMenu\": \"_MENU_ records per page\"
\t\t},
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\treturn '<button class=\"btn btn-inverse btn-icon glyphicons notes_2\" onclick=\"viewactivity(\\''+full[0]+'\\')\"><i></i>Activity</button> <button class=\"btn btn-inverse btn-icon glyphicons pencil\" onclick=\"editsubkomponen(\\''+full[0]+'\\',\\''+full[2]+'\\')\"><i></i>Ubah</button> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletesubkomponen(\\''+full[0]+'\\')\"><i></i>Hapus</button>';
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation2',aTargets:[6]
\t\t\t},
\t\t\t{
\t\t\t\tsClass:'index',aTargets:[0]
\t\t\t}
\t\t\t,
\t\t\t{
\t\t\t\tmRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tif(full[3]==1)
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js ok\" href=\"javascript:void(0);\" title=\"Klik Here To Editable\" onclick=\"p(\\''+full[0]+'\\')\"><i></i></a>';
\t\t\t\t\telse
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js remove\" href=\"javascript:void(0);\" title=\"Klik Here To Read Only\" onclick=\"p(\\''+full[0]+'\\')\"\"><i></i></a>';
\t\t\t\t},
\t\t\t\tsClass:'center',bSearchable:false,bSearchable:false,aTargets:[3]
\t\t\t}
\t\t\t,
\t\t\t{
\t\t\t\tmRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tif(full[4]==1)
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js ok\" href=\"javascript:void(0);\" title=\"Klik Here To Editable\" onclick=\"a(\\''+full[0]+'\\')\"><i></i></a>';
\t\t\t\t\telse
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js remove\" href=\"javascript:void(0);\" title=\"Klik Here To Read Only\" onclick=\"a(\\''+full[0]+'\\')\"\"><i></i></a>';
\t\t\t\t},
\t\t\t\tsClass:'center',bSearchable:false,bSearchable:false,aTargets:[4]
\t\t\t}
\t\t\t,
\t\t\t{
\t\t\t\tmRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tif(full[5]==1)
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js ok\" href=\"javascript:void(0);\" title=\"Klik Here To Editable\" onclick=\"k(\\''+full[0]+'\\')\"><i></i></a>';
\t\t\t\t\telse
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js remove\" href=\"javascript:void(0);\" title=\"Klik Here To Read Only\" onclick=\"k(\\''+full[0]+'\\')\"\"><i></i></a>';
\t\t\t\t},
\t\t\t\tsClass:'center',bSearchable:false,bSearchable:false,aTargets:[5]
\t\t\t}
       ]
\t});
\t\$(\"#komponen-add-btn\").click(function(){
\t\tkomponen_url_transaction = \"";
        // line 178
        echo twig_escape_filter($this->env, site_url("komponen/subkomponen_add"), "html", null, true);
        echo "\";
\t\t\$(\"#komponen-modal-form\").modal('show');
\t});
\t\$('#komponen-modal-form').on('hidden.bs.modal', function () {
         \$(\"#komponen-form\")[0].reset();
    });
\t\$('#aktifitas-modal-form').on('hidden.bs.modal', function () {
\t \$(\"#aktifitas-form\")[0].reset();
    });
\t\$(\"#komponen-form\").validate({
\t\tsubmitHandler: function(form) {
\t\t\tvar response;
\t\t\t\$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: komponen_url_transaction,
\t\t\t  data: \$(\"#komponen-form\").serialize(),
\t\t\t  success: function(data){
\t\t\t  },
\t\t\t  error : function(){
\t\t\t\t  \$(\"#komponen-modal-form .alert-error span\").text(\"Your Data Transaction Failed, Please Contact Your Administrator\");
\t\t\t\t  \$(\"#komponen-modal-form .alert-error\").removeClass('hide');
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t}).done(function(data){
\t\t\t\t if(data.success)
\t\t\t\t {
\t\t\t\t\t table.fnReloadAjax();
\t\t\t\t\t \$(\"#komponen-modal-form\").modal('hide');
\t\t\t\t\t \$(\"#komponen-modal-form .alert-error\").removeClass('hide');
\t\t\t\t\t \$(\"#komponen-modal-form .alert-error\").addClass('hide');
\t\t\t\t\t \$(\"#komponen-form\")[0].reset();
\t\t\t\t }
\t\t\t\t else
\t\t\t\t {
\t\t\t\t\t \$(\"#komponen-modal-form .alert-error span\").text(data.message);
\t\t\t\t\t \$(\"#komponen-modal-form .alert-error\").removeClass('hide');
\t\t\t\t }
\t\t\t  });
\t\t}
\t});
\t\$(\"#aktifitas-form\").validate({
\t\tsubmitHandler: function(form) {
\t\t\t\$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 222
        echo twig_escape_filter($this->env, site_url("komponen/subkomponen_akfitias_add"), "html", null, true);
        echo "\",
\t\t\t  data: \$(\"#aktifitas-form\").serialize(),
\t\t\t  success: function(data){
\t\t\t\t  getaktifitaslist(\$(\"#aktifitas-form #id_subkomponen\").val());
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t});
\t\t\treturn false;
\t\t}
\t});
\t
});
</script>
<div class=\"modal hide fade\" id=\"komponen-modal-form\">
\t
  <div class=\"modal-header\">
    <h3>Tambah Sub Komponen Biaya</h3>
  </div>
  <form action=\"\" method=\"post\" id=\"komponen-form\">
  <div class=\"modal-body\">
    <p>
    \t<div class=\"widget widget-4\">
        \t<div class=\"alert alert-error hide\">
                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <span>Oh snap!Change a few things up and try submitting
                again.</span>
            </div>
            <div class=\"widget-head\"><h4 class=\"heading\">Nama Sub Komponen Biaya</h4></div>
            <div class=\"separator\"></div>
            <div class=\"row-fluid\">
                <input type=\"text\" class=\"span12 required\" placeholder=\"Nama Sub Komponen\" name=\"nama_subkomponen\" id=\"nama_subkomponen\">
            </div>
        </div>
    </p>
  </div>
  <div class=\"modal-footer\">
  \t<input type=\"hidden\" name=\"id\" id=\"id\" />
    <input type=\"hidden\" name=\"id_komponen\" value=\"";
        // line 259
        if (isset($context["id_komponen"])) { $_id_komponen_ = $context["id_komponen"]; } else { $_id_komponen_ = null; }
        echo twig_escape_filter($this->env, $_id_komponen_, "html", null, true);
        echo "\" />
    <button type=\"button\" class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
  </div>
  </form>
</div>


<div class=\"modal hide fade\" id=\"aktifitas-modal-form\">
\t
  <div class=\"modal-header\">
    <h3>Tambah Sub Komponen Biaya</h3>
  </div>
  <form action=\"\" method=\"post\" id=\"aktifitas-form\">
  <div class=\"modal-body\">
    <p>
    \t<div class=\"widget widget-4\">
            <div class=\"widget-head\"><h4 class=\"heading\">Nama Sub Komponen Biaya</h4></div>
            <div class=\"separator\"></div>
            <div class=\"row-fluid\">
                <select name=\"id_aktifitas\" id=\"id_aktifitas\" class=\"required\">
\t\t\t\t\t<option value=\"\">--SELECT AKTIFITAS--</option>
                </select>
                <button class=\"btn btn-inverse\" id=\"btn-tambah-aktifitas\">Tambah Aktifitas</button>
            </div>
        </div>
        <div style=\"padding: 10px 0;\" class=\"widget-body\">
\t\t\t<table class=\"table table-bordered table-primary\" id=\"aktifitas-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"center\">No.</th>
\t\t\t\t\t\t<th>Nama Aktifitas</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"center\">1</td>
\t\t\t\t\t\t<td>Lorem ipsum dolor</td>
\t\t\t\t\t\t<td>Lorem ipsum dolor</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
    </p>
  </div>
  <div class=\"modal-footer\">
  \t<input type=\"hidden\" name=\"id_subkomponen\" id=\"id_subkomponen\" />
    <button type=\"button\" class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
  </form>
</div>


<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Data Sub Komponen Biaya</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px;\">
        <button type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" id=\"komponen-add-btn\"><i></i>Tambah Sub Komponen Biaya</button>
        </div>
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"komponen-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>ID</th>
\t\t\t\t\t\t<th>Komponen Biaya</th>
                        <th>Sub Komponen Biaya</th>
                        <th>P</th>
                        <th>A</th>
                        <th>K</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>
    
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/komponen/list_subkomponen.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  317 => 259,  277 => 222,  230 => 178,  175 => 128,  160 => 116,  145 => 104,  130 => 92,  107 => 72,  90 => 58,  68 => 39,  43 => 17,  28 => 5,  22 => 2,  19 => 1,);
    }
}
