<?php

/* modules/komponen/list.html */
class __TwigTemplate_c24b33e511081ec756487d5d8fc65896 extends Twig_Template
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
        echo twig_escape_filter($this->env, site_url("komponen/add"), "html", null, true);
        echo "\";
function editkomponen(id,prop)
{
\tkomponen_url_transaction = \"";
        // line 5
        echo twig_escape_filter($this->env, site_url("komponen/edit"), "html", null, true);
        echo "\";
\t\$(\"#komponen-form #id\").val(id);
\t\$(\"#komponen-form #nama_komponen\").val(prop);
\t\$(\"#komponen-modal-form\").modal('show');
}
function viewsubkomponen(id)
{
\tdocument.location.href=\"";
        // line 12
        echo twig_escape_filter($this->env, site_url("komponen/subkomponen/"), "html", null, true);
        echo "\"+id;
}
function deletekomponen(idprop)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 21
        echo twig_escape_filter($this->env, site_url("komponen/delete"), "html", null, true);
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
function komponenread(id_komp)
{
\t\$.ajax({
\t  type: \"POST\",
\t  url: \"";
        // line 35
        echo twig_escape_filter($this->env, site_url("komponen/readonly"), "html", null, true);
        echo "\",
\t  data: {id:id_komp},
\t  success: function(data){
\t\t   \$(\"#komponen-table\").dataTable().fnReloadAjax();
\t  },
\t  dataType: 'json'
\t})
\treturn false;
}
\$(document).on('ready',function(){
\tvar table = \$(\"#komponen-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 48
        echo twig_escape_filter($this->env, site_url("komponen/listing"), "html", null, true);
        echo "\",
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\treturn '<button class=\"btn btn-inverse btn-icon\" onclick=\"viewsubkomponen(\\''+full[0]+'\\')\"><i>('+full[3]+')</i> Sub Komponen</button> <button class=\"btn btn-inverse btn-icon glyphicons pencil\" onclick=\"editkomponen(\\''+full[0]+'\\',\\''+full[1]+'\\')\"><i></i>Ubah</button> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletekomponen(\\''+full[0]+'\\')\"><i></i>Hapus</button>';
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation2',aTargets:[3]
\t\t\t},
\t\t\t{
\t\t\t\tsClass:'index',aTargets:[0]
\t\t\t},
\t\t\t{
\t\t\t\tmRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tif(full[2]==1)
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js ok\" href=\"javascript:void(0);\" title=\"Klik Here To Editable\" onclick=\"komponenread(\\''+full[0]+'\\')\"><i></i></a>';
\t\t\t\t\telse
\t\t\t\t\t\treturn '<a class=\"glyphicons no-js remove\" href=\"javascript:void(0);\" title=\"Klik Here To Read Only\" onclick=\"komponenread(\\''+full[0]+'\\')\"\"><i></i></a>';
\t\t\t\t},
\t\t\t\tsClass:'center',bSearchable:false,bSearchable:false,aTargets:[2]
\t\t\t}
       ]
\t});
\t\$(\"#komponen-add-btn\").click(function(){
\t\tkomponen_url_transaction = \"";
        // line 70
        echo twig_escape_filter($this->env, site_url("komponen/add"), "html", null, true);
        echo "\";
\t\t\$(\"#komponen-modal-form\").modal('show');
\t});
\t\$('#komponen-modal-form').on('hidden.bs.modal', function () {
         \$(\"#osp-form\")[0].reset();
    })
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
});
</script>
<div class=\"modal hide fade\" id=\"komponen-modal-form\">
\t
  <div class=\"modal-header\">
    <h3>Tambah Komponen Biaya</h3>
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
            <div class=\"widget-head\"><h4 class=\"heading\">Nama Komponen Biaya</h4></div>
            <div class=\"separator\"></div>
            <div class=\"row-fluid\">
                <input type=\"text\" class=\"span12 required\" placeholder=\"Nama komponen\" name=\"nama_komponen\" id=\"nama_komponen\">
            </div>
        </div>
    </p>
  </div>
  <div class=\"modal-footer\">
  \t<input type=\"hidden\" name=\"id\" id=\"id\" />
    <button type=\"button\" class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
    <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
  </div>
  </form>
</div>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Data Komponen Biaya</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px;\">
        <button type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" id=\"komponen-add-btn\"><i></i>Tambah Komponen Biaya</button>
        </div>
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"komponen-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>ID</th>
\t\t\t\t\t\t<th>Komponen Biaya</th>
                        <th>Read Only</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/komponen/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 70,  83 => 48,  67 => 35,  50 => 21,  38 => 12,  28 => 5,  22 => 2,  19 => 1,);
    }
}
