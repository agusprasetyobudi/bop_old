<?php

/* modules/grouppengguna/list.html */
class __TwigTemplate_1db48f6e3b53e4ff9199983fc901427e extends Twig_Template
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
var grouppengguna_url_transaction = \"";
        // line 2
        echo twig_escape_filter($this->env, site_url("grouppengguna/add"), "html", null, true);
        echo "\";
function editgrouppengguna(id,prop)
{
\tgrouppengguna_url_transaction = \"";
        // line 5
        echo twig_escape_filter($this->env, site_url("grouppengguna/edit"), "html", null, true);
        echo "\";
\t\$(\"#grouppengguna-form #id\").val(id);
\t\$(\"#grouppengguna-form #nama_group\").val(prop);
\t\$(\"#grouppengguna-modal-form .modal-header h3\").text('Ubah Kelompok Pengguna');
\t\$(\"#grouppengguna-modal-form\").modal('show');
}
function deletegrouppengguna(idprop)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 18
        echo twig_escape_filter($this->env, site_url("grouppengguna/delete"), "html", null, true);
        echo "\",
\t\t\t  data: {id:idprop},
\t\t\t  success: function(data){
\t\t\t\t  \$(\"#grouppengguna-table\").dataTable().fnReloadAjax();
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t})
\t  }
\t}); 
}
function permission(idgroup)
{
\tdocument.location.href=\"";
        // line 30
        echo twig_escape_filter($this->env, site_url("grouppengguna/akses/"), "html", null, true);
        echo "\"+idgroup;
}
\$(document).on('ready',function(){
\tvar table = \$(\"#grouppengguna-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 36
        echo twig_escape_filter($this->env, site_url("grouppengguna/listing"), "html", null, true);
        echo "\",
\t\t\"aoColumnDefs\": [
\t\t  \t/*{mRender : function(data, type, full){
\t\t\t\treturn '<button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"permission(\\''+full[0]+'\\')\"><i></i>Akses</button> <button class=\"btn btn-inverse btn-icon glyphicons pencil\" onclick=\"editgrouppengguna(\\''+full[0]+'\\',\\''+full[1]+'\\')\"><i></i>Ubah</button> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletegrouppengguna(\\''+full[0]+'\\')\"><i></i>Hapus</button>';
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation2',aTargets:[2]
\t\t\t},*/
\t\t\t{
\t\t\t\tsClass:'index',aTargets:[0]
\t\t\t}
       ]
\t});
\t\$(\"#grouppengguna-add-btn\").click(function(){
\t\tgrouppengguna_url_transaction = \"";
        // line 48
        echo twig_escape_filter($this->env, site_url("grouppengguna/add"), "html", null, true);
        echo "\";
\t\t\$(\"#grouppengguna-modal-form\").modal('show');
\t});
\t\$(\"#grouppengguna-form\").validate({
\t\tsubmitHandler: function(form) {
\t\t\tvar response;
\t\t\t\$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: grouppengguna_url_transaction,
\t\t\t  data: \$(\"#grouppengguna-form\").serialize(),
\t\t\t  success: function(data){
\t\t\t  },
\t\t\t  error : function(){
\t\t\t\t  \$(\"#grouppengguna-modal-form .alert-error span\").text(\"Your Data Transaction Failed, Please Contact Your Administrator\");
\t\t\t\t  \$(\"#grouppengguna-modal-form .alert-error\").removeClass('hide');
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t}).done(function(data){
\t\t\t\t if(data.success)
\t\t\t\t {
\t\t\t\t\t table.fnReloadAjax();
\t\t\t\t\t \$(\"#grouppengguna-modal-form\").modal('hide');
\t\t\t\t\t \$(\"#grouppengguna-modal-form .alert-error\").removeClass('hide');
\t\t\t\t\t \$(\"#grouppengguna-modal-form .alert-error\").addClass('hide');
\t\t\t\t\t \$(\"#grouppengguna-form\")[0].reset();
\t\t\t\t }
\t\t\t\t else
\t\t\t\t {
\t\t\t\t\t \$(\"#grouppengguna-modal-form .alert-error span\").text(data.message);
\t\t\t\t\t \$(\"#grouppengguna-modal-form .alert-error\").removeClass('hide');
\t\t\t\t }
\t\t\t  });
\t\t}
\t});
\t\$('#grouppengguna-modal-form').on('hidden.bs.modal', function () {
         \$(\"#grouppengguna-form\")[0].reset();
\t\t  \$(\"#grouppengguna-form #id\").val(\"\");
\t\t grouppengguna_url_transaction = \"";
        // line 85
        echo twig_escape_filter($this->env, site_url("grouppengguna/add"), "html", null, true);
        echo "\";\t
\t\t \$(\"#grouppengguna-modal-form .modal-header h3\").text('Tambah Kelompok Pengguna');
    })
});
</script>
<div class=\"modal hide fade\" id=\"grouppengguna-modal-form\">
\t
  <div class=\"modal-header\">
    <h3>Tambah Kelompok Pengguna</h3>
  </div>
  <form action=\"\" method=\"post\" id=\"grouppengguna-form\">
  <div class=\"modal-body\">
    <p>
    \t<div class=\"widget widget-4\">
        \t<div class=\"alert alert-error hide\">
                <button data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <span>Oh snap!Change a few things up and try submitting
                again.</span>
            </div>
            <div class=\"widget-head\"><h4 class=\"heading\">Nama Kelompok Pengguna</h4></div>
            <div class=\"separator\"></div>
            <div class=\"row-fluid\">
                <input type=\"text\" class=\"span12 required\" placeholder=\"Nama Kelompok Pengguna\" name=\"nama_group\" id=\"nama_group\">
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
\t\t\t<h4 class=\"heading\">Data Kelompok Pengguna</h4>
\t\t</div>
        <!--<div style=\"background:#fff; padding-top:20px;\">
        <button type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" id=\"grouppengguna-add-btn\"><i></i>Tambah Kelompok Pengguna</button>
        </div>-->
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"grouppengguna-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>ID</th>
\t\t\t\t\t\t<th>Kelompok Pengguna</th>
\t\t\t\t\t\t<!--<th>&nbsp;</th>-->
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
        return "modules/grouppengguna/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 85,  83 => 48,  68 => 36,  59 => 30,  44 => 18,  28 => 5,  22 => 2,  19 => 1,);
    }
}
