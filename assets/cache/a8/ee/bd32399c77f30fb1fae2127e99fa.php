<?php

/* modules/kontrak/list.html */
class __TwigTemplate_a8eebd32399c77f30fb1fae2127e99fa extends Twig_Template
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
function deletekontrak(idprop)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 9
        echo twig_escape_filter($this->env, site_url("kontrak/delete"), "html", null, true);
        echo "\",
\t\t\t  data: {kode_kontrak:idprop},
\t\t\t  success: function(data){
\t\t\t\t  \$(\"#kontrak-table\").dataTable().fnReloadAjax();
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t})
\t  }
\t}); 
}
function editkontrak(id)
{
\tdocument.location.href=\"";
        // line 21
        echo twig_escape_filter($this->env, site_url("kontrak/edit/"), "html", null, true);
        echo "\"+id;
}
\$(document).on('ready',function(){
\tvar table = \$(\"#kontrak-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 27
        echo twig_escape_filter($this->env, site_url("kontrak/listing"), "html", null, true);
        echo "\",
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\treturn '<button class=\"btn btn-inverse btn-icon glyphicons pencil\" onclick=\"editkontrak(\\''+full[0]+'\\')\"><i></i>Ubah</button> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletekontrak(\\''+full[0]+'\\')\"><i></i>Hapus</button>';
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation',aTargets:[4]
\t\t\t},
\t\t\t{
\t\t\t\tsClass:'index',aTargets:[0]
\t\t\t}
       ]
\t});
\t\$(\"#kontrak-add-btn\").on('click',function(){
\t\tdocument.location.href=\"";
        // line 39
        echo twig_escape_filter($this->env, site_url("kontrak/add"), "html", null, true);
        echo "\";
\t});
});
</script>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Data kontrak</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px;\">
        <button type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" id=\"kontrak-add-btn\"><i></i>Tambah kontrak</button>
        </div>
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"kontrak-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Kode Kontrak</th>
                        <th>Tanggal Kontrak</th>
                        <th>Mulai Kontrak</th>
                        <th>Akhir Kontrak</th>
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
        return "modules/kontrak/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 39,  53 => 27,  44 => 21,  29 => 9,  19 => 1,);
    }
}
