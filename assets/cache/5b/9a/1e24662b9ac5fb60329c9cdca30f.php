<?php

/* modules/pengeluaran/list.html */
class __TwigTemplate_5b9a1e24662b9ac5fb60329c9cdca30f extends Twig_Template
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
        echo twig_escape_filter($this->env, site_url("pengeluaran/delete"), "html", null, true);
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
function pilihtransfer(id)
{
\tdocument.location.href = \"";
        // line 25
        echo twig_escape_filter($this->env, site_url("pengeluaran/add/"), "html", null, true);
        echo "\"+id;
}
\$(document).on('ready',function(){
\tvar table = \$(\"#transfer-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 31
        echo twig_escape_filter($this->env, site_url("pengeluaran/listing"), "html", null, true);
        echo "\",
\t\tfnServerParams:function(aoData){
\t\t\taoData.push({\"name\":\"id_group\", \"value\":\"";
        // line 33
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group"), "html", null, true);
        echo "\"});
\t\t\taoData.push({\"name\":\"kode_kantor\", \"value\":\"";
        // line 34
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "kode_kantor"), "html", null, true);
        echo "\"});
\t\t},
\t\tfnRowCallback:function(row, data, index){
\t\t\tif ( data[7].replace(/[\\\$,]/g, '')  > 0 ) {
                \$('td', row).eq(7).addClass('ss-green');
            }
\t\t\tif ( data[7].replace(/[\\\$,]/g, '')  < 0 ) {
\t\t\t\t\$('td', row).eq(7).addClass('ss-red');
\t\t\t}
\t\t\tif ( data[12].replace(/[\\\$,]/g, '')  > 0 ) {
                \$('td', row).eq(11).addClass('ss-green');
            }
\t\t\tif ( data[12].replace(/[\\\$,]/g, '')  < 0 ) {
\t\t\t\t\$('td', row).eq(11).addClass('ss-red');
\t\t\t}
\t\t},
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\tvar url = \"";
        // line 52
        echo twig_escape_filter($this->env, site_url("pengeluaran/edit/"), "html", null, true);
        echo "\"+full[13];
\t\t\t\treturn '<a class=\"btn btn-inverse btn-icon glyphicons pencil\" title=\"Ubah\" href=\"'+url+'\"><i></i>&nbsp;</a> <button class=\"btn btn-inverse btn-icon glyphicons bin\" onclick=\"deletetransfer(\\''+full[13]+'\\')\" title=\"Hapus\"><i></i>&nbsp;</button>';
\t\t\t},bSearchable:false,bSearchable:false,sClass:'operation2',aTargets:[13]
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
\t\t\t},
\t\t\t{mRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tdollars = full[7];
\t\t\t\t\tdollars = dollars.split('').reverse().join('')
        .replace(/(\\d{3}(?!\$))/g, '\$1,')
        .split('').reverse().join('');
\t\t\t\t\treturn dollars;
\t\t\t\t}
\t\t\t\t,aTargets:[7]
\t\t\t},
\t\t\t{mRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tdollars = full[11];
\t\t\t\t\tdollars = dollars.split('').reverse().join('')
        .replace(/(\\d{3}(?!\$))/g, '\$1,')
        .split('').reverse().join('');
\t\t\t\t\treturn dollars;
\t\t\t\t}
\t\t\t\t,aTargets:[11]
\t\t\t},
\t\t\t{mRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tdollars = full[12];
\t\t\t\t\tdollars = dollars.split('').reverse().join('')
        .replace(/(\\d{3}(?!\$))/g, '\$1,')
        .split('').reverse().join('');
\t\t\t\t\treturn dollars;
\t\t\t\t}
\t\t\t\t,aTargets:[12]
\t\t\t}
       ]
\t});
\t\$(\".dataTables_paginate\").addClass('span6');
\t\$(\".dataTables_paginate\").addClass('pull-right');
\tvar tables = \$(\"#transfer-dialog-table\").dataTable({
\t\t\"bProcessing\": true,
        \"bServerSide\": true,
\t\t\"sAjaxSource\": \"";
        // line 119
        echo twig_escape_filter($this->env, site_url("pengeluaran/listing_transfer"), "html", null, true);
        echo "\",
\t\tfnServerParams:function(aoData){
\t\t\taoData.push({\"name\":\"id_group\", \"value\":\"";
        // line 121
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "id_group"), "html", null, true);
        echo "\"});
\t\t\taoData.push({\"name\":\"kode_kantor\", \"value\":\"";
        // line 122
        if (isset($context["__SESSION"])) { $___SESSION_ = $context["__SESSION"]; } else { $___SESSION_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($___SESSION_, "bop_last"), "kode_kantor"), "html", null, true);
        echo "\"});
\t\t},
\t\t\"aoColumnDefs\": [
\t\t  \t{mRender : function(data, type, full){
\t\t\t\tvar url = \"";
        // line 126
        echo twig_escape_filter($this->env, site_url("transfer/edit/"), "html", null, true);
        echo "\"+full[11];
\t\t\t\tif(full[12])
\t\t\t\t{
\t\t\t\t\treturn '<button class=\"btn btn-inverse search\" onclick=\"pilihtransfer(\\''+full[11]+'\\')\" title=\"Pilih Bukti Transfer\"><i></i>Pilih</button>';
\t\t\t\t}
\t\t\t\t
\t\t\t},bSearchable:false,bSearchable:false,aTargets:[11]
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
\t\t\t},
\t\t\t{mRender : function(data, type, full)
\t\t\t\t{
\t\t\t\t\tdollars = full[7];
\t\t\t\t\tdollars = dollars.split('').reverse().join('')
        .replace(/(\\d{3}(?!\$))/g, '\$1,')
        .split('').reverse().join('');
\t\t\t\t\treturn dollars;
\t\t\t\t}
\t\t\t\t,aTargets:[7]
\t\t\t}
       ]
\t});
\t\$('#pengeluaran-modal-form').on('show.bs.modal', function (e) {
\t\ttables.dataTable().fnReloadAjax();
\t});
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
<div class=\"modal hide fade\" id=\"pengeluaran-modal-form\" style=\"width:90%;margin-left: -45%;\">
\t
  <div class=\"modal-header\">
    <h3>Pilih Bukti Transfer</h3>
  </div>
  <div class=\"modal-body\">
    <p>
    \t<div class=\"widget widget-4\">
            <div class=\"widget-head\"><h4 class=\"heading\">Pilih Bukti Transfer</h4></div>
            <div class=\"separator\"></div>
            <div class=\"row-fluid\">
                <table class=\"table table-striped table-bordered table-primary table-condensed\" id=\"transfer-dialog-table\">
\t\t\t\t\t<thead>
                        <tr>
                          <th>No Bukti Transfer</th>
                          <th>Tanggal Transfer</th>
                          <th>Nama Penerima</th>
                          <th>Bank Penerima</th>
                          <th>No Rekening Penerima</th>
                          <th>Nilai Kontrak</th>
                          <th>Jumlah Diterima</th>
                          <th>Selisih</th>
                          <th>Tanggal Diterima</th>
                        \t<th>Periode</th>
                        \t
                            <th>&nbsp;</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </p>
  </div>
  <div class=\"modal-footer\">
    <button type=\"button\" class=\"btn\" data-dismiss=\"modal\" aria-hidden=\"true\">Close</button>
  </div>
</div>
<div class=\"innerLR\">
\t<div class=\"widget widget-gray widget-body-white\">
\t\t<div class=\"widget-head\">
\t\t\t<h4 class=\"heading\">Data Rekapitulasi Bukti Pengeluaran</h4>
\t\t</div>
        <div style=\"background:#fff; padding-top:20px;\">
        <a type=\"button\" class=\"btn btn-primary btn-icon glyphicons asterisk\" href=\"#\" data-toggle=\"modal\" data-target=\"#pengeluaran-modal-form\"><i></i>Tambah Data Rekapitulasi Bukti Pengeluaran</a>
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
                    \t<th>Periode</th>
\t\t\t\t\t\t<th>&nbsp;</th>
                        <th>Implementasi</th>
                    \t<th>Selilsih</th>
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
        return "modules/pengeluaran/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 126,  172 => 122,  167 => 121,  162 => 119,  92 => 52,  70 => 34,  65 => 33,  60 => 31,  51 => 25,  44 => 21,  29 => 9,  19 => 1,);
    }
}
