<?php

/* modules/firm/list.html */
class __TwigTemplate_49801361243b4261cf2116fddbad760d extends Twig_Template
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
function deletefirm(idprop)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 9
        echo twig_escape_filter($this->env, site_url("firm/delete"), "html", null, true);
        echo "\",
\t\t\t  data: {id:idprop},
\t\t\t  success: function(data){
\t\t\t\t  \$(\"#firm-table\").dataTable().fnReloadAjax();
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t})
\t  }
\t}); 
}
\$(document).on('ready',function(){
\tvar table = \$(\"#firm-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 23
        echo twig_escape_filter($this->env, site_url("firm/listing/"), "html", null, true);
        echo "\",
\t\tfnServerParams:function(aoData){
\t\t\taoData.push({\"name\":\"id_member\", \"value\":\"";
        // line 25
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id"), "html", null, true);
        echo "\"});
\t\t},
\t\t/*\"sDom\": 'B<\"clear\">lfrtipT',
\t\t\"oTableTools\": {
            \"sSwfPath\": \"assets/templates/theme/scripts/DataTables/media/swf/copy_csv_xls.swf\",
\t\t\taButtons:[
\t\t\t\t\"xls\"
\t\t\t]
        },*/
\t\t\"fnRowCallback\":function( nRow, aData, iDisplayIndex, iDisplayIndexFull){
\t\t\tif(aData[12]==1)
\t\t\t{
\t\t\t\tvar oSettings = table.fnSettings();
    \t\t\toSettings.aoData[iDisplayIndex].nTr.className = \"green\";
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\tvar oSettings = table.fnSettings();
    \t\t\toSettings.aoData[iDisplayIndex].nTr.className = \"red\";
\t\t\t}
\t\t},
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\tif(full[12]==0)
\t\t\t\t{
\t\t\t\tvar url = \"";
        // line 50
        echo twig_escape_filter($this->env, site_url("firm/edit/"), "html", null, true);
        echo "\"+full[0];
\t\t\t\treturn '<a class=\"btn btn-inverse btn-icon glyphicons pencil\" title=\"Ubah\" href=\"'+url+'\"><i></i>&nbsp;</a> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletefirm(\\''+full[0]+'\\')\" title=\"Hapus\"><i></i>&nbsp;</button>';
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\treturn '';
\t\t\t\t}
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation',aTargets:[11]
\t\t\t},
\t\t\t{
\t\t\t\tsClass:'index',aTargets:[0]
\t\t\t},
\t\t\t{
\t\t\t\tbVisible:false,aTargets:[12]
\t\t\t},
\t\t\t{mRender : function(data, type, full){
\t\t\t\treturn full[11]
\t\t\t},aTargets:[10]
\t\t\t},\t\t
       ]
\t});
\t\$(\".dataTables_paginate\").addClass('span6');
});
</script>
<style>
#firm-table tr.green td
{
\tbackground:#C6EBB3;
}
#firm-table tr.red td
{
\tbackground:#FFC0C6;
}
</style>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Data Firm Transfer</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px; text-align:right\" class=\"row\">
            <table class=\"table table-bordered\" style=\"width:350px\" align=\"right\">
                <tr>
                    <td width=\"200\">
                        Jumlah Entry
                    </td>
                    <td>
                        ";
        // line 96
        if (isset($context["info"])) { $_info_ = $context["info"]; } else { $_info_ = null; }
        echo twig_escape_filter($this->env, (($this->getAttribute($_info_, "total", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($_info_, "total"), 0)) : (0)), "html", null, true);
        echo "
                    </td>
                </tr>
                <tr>
                    <td>
                        Jumlah dikonfirmasi
                    </td>
                    <td>
                        ";
        // line 104
        if (isset($context["info"])) { $_info_ = $context["info"]; } else { $_info_ = null; }
        echo twig_escape_filter($this->env, (($this->getAttribute($_info_, "sudah", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($_info_, "sudah"), 0)) : (0)), "html", null, true);
        echo "
                    </td>
                </tr>
                <tr>
                    <td>
                        Jumlah Belum dikonfirmasi
                    </td>
                    <td>
                        ";
        // line 112
        if (isset($context["info"])) { $_info_ = $context["info"]; } else { $_info_ = null; }
        echo twig_escape_filter($this->env, (($this->getAttribute($_info_, "belum", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($_info_, "belum"), 0)) : (0)), "html", null, true);
        echo "
                    </td>
                </tr>
            </table>
        </div>
        <div style=\"background:#fff; padding-top:20px;\">
        <a type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" href=\"";
        // line 118
        echo twig_escape_filter($this->env, site_url("firm/add"), "html", null, true);
        echo "\"><i></i>Tambah Data Transfer Firm</a>
        </div>
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"firm-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>No Bukti Transfer</th>
                      <th>OSP</th>
                      <th>Nama Kantor</th>
                      <th>Tanggal Transfer</th>
                      <th>Jabatan</th>
                      <th>Bank Penerima</th>
                      <th>No Rekening Penerima</th>
                      <th>Nama Penerima</th>
                      <th>Jumlah Transfer</th>
                    \t<th>Periode</th>
                        <th>Keterangan</th>
\t\t\t\t\t\t<th>&nbsp;</th>
                        <th></th>
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
        return "modules/firm/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 118,  153 => 112,  141 => 104,  129 => 96,  80 => 50,  51 => 25,  46 => 23,  29 => 9,  19 => 1,);
    }
}
