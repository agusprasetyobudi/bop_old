<?php

/* modules/aktifitas/list.html */
class __TwigTemplate_6ff841513f3d7b1f2bb61ccdd9f91c94 extends Twig_Template
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
var aktifitas_url_transaction = \"";
        // line 2
        echo twig_escape_filter($this->env, site_url("aktifitas/add"), "html", null, true);
        echo "\";
function editaktifitas(id,prop)
{
\taktifitas_url_transaction = \"";
        // line 5
        echo twig_escape_filter($this->env, site_url("aktifitas/edit"), "html", null, true);
        echo "\";
\t\$(\"#aktifitas-form #id\").val(id);
\t\$(\"#aktifitas-form #nama_aktifitas\").val(prop);
\t\$(\"#aktifitas-modal-form\").modal('show');
}
function deleteaktifitas(idprop)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 17
        echo twig_escape_filter($this->env, site_url("aktifitas/delete"), "html", null, true);
        echo "\",
\t\t\t  data: {id:idprop},
\t\t\t  success: function(data){
\t\t\t\t  \$(\"#aktifitas-table\").dataTable().fnReloadAjax();
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t})
\t  }
\t}); 
}
\$(document).on('ready',function(){
\tvar table = \$(\"#aktifitas-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 31
        echo twig_escape_filter($this->env, site_url("aktifitas/listing"), "html", null, true);
        echo "\",
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\treturn '<button class=\"btn btn-inverse btn-icon glyphicons pencil\" onclick=\"editaktifitas(\\''+full[0]+'\\',\\''+full[1]+'\\')\"><i></i>Ubah</button> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deleteaktifitas(\\''+full[0]+'\\')\"><i></i>Hapus</button>';
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation',aTargets:[2]
\t\t\t},
\t\t\t{
\t\t\t\tsClass:'index',aTargets:[0]
\t\t\t}
       ]
\t});
\t\$(\"#aktifitas-add-btn\").click(function(){
\t\taktifitas_url_transaction = \"";
        // line 43
        echo twig_escape_filter($this->env, site_url("aktifitas/add"), "html", null, true);
        echo "\";
\t\t\$(\"#aktifitas-modal-form\").modal('show');
\t});
\t\$(\"#aktifitas-form\").validate({
\t\tsubmitHandler: function(form) {
\t\t\tvar response;
\t\t\t\$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: aktifitas_url_transaction,
\t\t\t  data: \$(\"#aktifitas-form\").serialize(),
\t\t\t  success: function(data){
\t\t\t  },
\t\t\t  error : function(){
\t\t\t\t  \$(\"#aktifitas-modal-form .alert-error span\").text(\"Your Data Transaction Failed, Please Contact Your Administrator\");
\t\t\t\t  \$(\"#aktifitas-modal-form .alert-error\").removeClass('hide');
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t}).done(function(data){
\t\t\t\t if(data.success)
\t\t\t\t {
\t\t\t\t\t table.fnReloadAjax();
\t\t\t\t\t \$(\"#aktifitas-modal-form\").modal('hide');
\t\t\t\t\t \$(\"#aktifitas-modal-form .alert-error\").removeClass('hide');
\t\t\t\t\t \$(\"#aktifitas-modal-form .alert-error\").addClass('hide');
\t\t\t\t\t \$(\"#aktifitas-form\")[0].reset();
\t\t\t\t }
\t\t\t\t else
\t\t\t\t {
\t\t\t\t\t \$(\"#aktifitas-modal-form .alert-error span\").text(data.message);
\t\t\t\t\t \$(\"#aktifitas-modal-form .alert-error\").removeClass('hide');
\t\t\t\t }
\t\t\t  });
\t\t}
\t});
\t\$('#aktifitas-modal-form').on('hidden.bs.modal', function () {
         \$(\"#aktifitas-form\")[0].reset();
    })
});
</script>
<div class=\"modal hide fade\" id=\"aktifitas-modal-form\">
\t
  <div class=\"modal-header\">
    <h3>Tambah aktifitas</h3>
  </div>
  <form action=\"\" method=\"post\" id=\"aktifitas-form\">
  <div class=\"modal-body\">
    <p>
    \t<div class=\"widget widget-4\">
        \t<div class=\"alert alert-error hide\">
                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <span>Oh snap!Change a few things up and try submitting
                again.</span>
            </div>
            <div class=\"widget-head\"><h4 class=\"heading\">Nama aktifitas</h4></div>
            <div class=\"separator\"></div>
            <div class=\"row-fluid\">
                <input type=\"text\" class=\"span12 required\" placeholder=\"Nama aktifitas\" name=\"nama_aktifitas\" id=\"nama_aktifitas\">
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
\t\t\t<h4 class=\"heading\">Data aktifitas</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px;\">
        <button type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" id=\"aktifitas-add-btn\"><i></i>Tambah aktifitas</button>
        </div>
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"aktifitas-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>ID</th>
\t\t\t\t\t\t<th>aktifitas</th>
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
        return "modules/aktifitas/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 43,  60 => 31,  43 => 17,  28 => 5,  22 => 2,  19 => 1,);
    }
}
