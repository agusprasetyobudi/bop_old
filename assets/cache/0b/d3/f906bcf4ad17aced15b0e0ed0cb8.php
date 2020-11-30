<?php

/* modules/transfer/list.html */
class __TwigTemplate_0bd3f906bcf4ad17aced15b0e0ed0cb8 extends Twig_Template
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
function deletetransfer(idprop)
{
\tbootbox.confirm(\"Are you sure to delete this record?\", function(result) {
\t  if(result)
\t  {
\t\t  \$.ajax({
\t\t\t  type: \"POST\",
\t\t\t  url: \"";
        // line 9
        echo twig_escape_filter($this->env, site_url("transfer/delete"), "html", null, true);
        echo "\",
\t\t\t  data: {id:idprop},
\t\t\t  success: function(data){
\t\t\t\t  \$(\"#transfer-table\").dataTable().fnReloadAjax();
\t\t\t  },
\t\t\t  dataType: 'json'
\t\t\t})
\t  }
\t}); 
}
function detiltransfer(id)
{
\tdocument.location.href=\"";
        // line 21
        echo twig_escape_filter($this->env, site_url("transfer/detil/"), "html", null, true);
        echo "\"+id;
}
\$(document).on('ready',function(){
\tvar s_class = '';
\tvar table = \$(\"#transfer-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 28
        echo twig_escape_filter($this->env, site_url("transfer/listing"), "html", null, true);
        echo "\",
\t\t/*\"sDom\": 'B<\"clear\">lfrtipT',*/
\t\tfnServerParams:function(aoData){
\t\t\taoData.push({\"name\":\"id_group\", \"value\":\"";
        // line 31
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group"), "html", null, true);
        echo "\"});
\t\t},
\t\tfnRowCallback:function(row, data, index){
\t\t\tconsole.log(data[7]);
\t\t\tif ( data[7].replace(/[\\\$,]/g, '')  > 0 ) {
                \$('td', row).eq(7).addClass('ss-green');
            }
\t\t\tif ( data[7].replace(/[\\\$,]/g, '')  < 0 ) {
\t\t\t\t\$('td', row).eq(7).addClass('ss-red');
\t\t\t}
\t\t}/*,
\t\t\"oTableTools\": {
            \"sSwfPath\": \"assets/templates/theme/scripts/DataTables/media/swf/copy_csv_xls_pdf.swf\",
\t\t\taButtons:[
\t\t\t\t{
                    \"sExtends\": \"xls\",
                    \"sButtonText\": \"Export To Excel\",
                    \"mColumns\": \"visible\"
                }
\t\t\t]
        }*/,
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\tvar url = \"";
        // line 54
        echo twig_escape_filter($this->env, site_url("transfer/edit/"), "html", null, true);
        echo "\"+full[11];
\t\t\t\tif(full[12])
\t\t\t\t{
\t\t\t\t\treturn '<button class=\"btn btn-inverse btn-icon glyphicons search\" onclick=\"detiltransfer(\\''+full[11]+'\\')\" title=\"Detil\"><i></i>&nbsp;</button> <a class=\"btn btn-inverse btn-icon glyphicons pencil\" title=\"Ubah\" href=\"'+url+'\"><i></i>&nbsp;</a> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletetransfer(\\''+full[11]+'\\')\" title=\"Hapus\"><i></i>&nbsp;</button>';
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\treturn '<button class=\"btn btn-inverse btn-icon glyphicons search\" onclick=\"detiltransfer(\\''+full[11]+'\\')\" title=\"Detil\"><i></i>&nbsp;</button>';
\t\t\t\t}
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation2',aTargets:[11]
\t\t\t},
\t\t\t{
\t\t\t\tsClass:'index',aTargets:[0]
\t\t\t},
\t\t\t{
\t\t\t\tbVisible:false,aTargets:[10]
\t\t\t},
\t\t\t{mRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tdollars = full[5];
\t\t\t\t\tdollars = dollars.split('').reverse().join('')
        .replace(/(\\d{3}(?!\$))/g, '\$1,')
        .split('').reverse().join('');
\t\t\t\t\treturn dollars;
\t\t\t\t}
\t\t\t\t,aTargets:[5]
\t\t\t},
\t\t\t{mRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tdollars = full[6];
\t\t\t\t\tdollars = dollars.split('').reverse().join('')
        .replace(/(\\d{3}(?!\$))/g, '\$1,')
        .split('').reverse().join('');
\t\t\t\t\treturn dollars;
\t\t\t\t}
\t\t\t\t,aTargets:[6]
\t\t\t}
       ]
\t});
\t\$(\".dataTables_paginate\").addClass('span6');
\t\$(\".dataTables_paginate\").addClass('pull-right');
});
</script>
<style>
div.DTTT_container
{
\tfloat:none;
\ttop:25px;
}
.dataTables_paginate
{
\ttext-align:right;
}
</style>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Data Rekapitulasi Bukti Transfer</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px;\">
        <a type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" href=\"";
        // line 114
        echo twig_escape_filter($this->env, site_url("transfer/add"), "html", null, true);
        echo "\"><i></i>Tambah Data Rekapitulasi Bukti Transfer</a>
        </div>
\t\t<div class=\"widget-body\" style=\"padding: 10px 0;\">
\t\t\t<table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"transfer-table\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>No Bukti Transfer</th>
                      <th>Tanggal Transfer</th>
                      <th>Nama Penerima</th>
                      <th>Bank Penerima</th>
                      <th>No Rekening Penerima</th>
                      <th>Nilai Kontrak</th>
                      <th>Jumlah Diterima</th>
                      <th>Selisih</th>
                      <th>Tanggal Diterima</th>
                    <th>Periode</th>
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
        return "modules/transfer/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 114,  87 => 54,  60 => 31,  54 => 28,  44 => 21,  29 => 9,  19 => 1,);
    }
}
