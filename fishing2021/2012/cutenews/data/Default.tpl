<?PHP
///////////////////// TEMPLATE Default /////////////////////
$template_active = <<<HTML
<div style="width:670px; margin-bottom:20px;">
<table border="0" width="100%" cellpadding="0" cellspacing="2" bgcolor="#8B0000" style="border-bottom-width:1; border-bottom-color:rgb(0,0,0); border-bottom-style:solid;">
    <tr>
        <td width="80%"><strong><span style="font-size:10pt; color:#ffffff;" >{title}</span></strong></td>
        <td width="20%" align="right"><b><span style="font-size:10pt; color:#ffffff;">{date}</span></b></td>
    </tr>
</table>

<div style="text-align:justify; padding:3px; margin-top:3px; margin-bottom:5px; font-size:10pt; ">{short-story}</div>

<div style="float: right;">[full-link]Tovább >>[/full-link] </div>


</div>
HTML;


$template_full = <<<HTML
<div style="width:670px; margin-bottom:20px;">
<table border="0" width="100%" cellpadding="0" cellspacing="2" bgcolor="#fd9701" style="border-bottom-width:1; border-bottom-color:rgb(255,108,2); border-bottom-style:solid;">
    <tr>
        <td width="80%"><strong><span style="font-size:9pt;">{title}</span></strong></td>
        <td width="20%" align="right"><b><font color="#000000">{date}</font></b></td>
    </tr>
</table>

<div style="text-align:justify; padding:3px; margin-top:3px; margin-bottom:5px;">{full-story}</div>



</div>
HTML;


$template_comment = <<<HTML
<div style="width: 400px; margin-bottom:20px;">

<div style="border-bottom:1px solid black;"> by <strong>{author}</strong> @ {date}</div>

<div style="padding:2px; background-color:#F9F9F9">{comment}</div>

</div>
HTML;


$template_form = <<<HTML
  <table border="0" width="370" cellspacing="0" cellpadding="0">
    <tr>
      <td width="60">Name:</td>
      <td><input type="text" name="name"></td>
    </tr>
    <tr>
      <td>E-mail:</td>
      <td><input type="text" name="mail"> (optional)</td>
    </tr>
    <tr>
      <td>Smile:</td>
      <td>{smilies}</td>
    </tr>
    <tr>
      <td colspan="2">
      <textarea cols="40" rows="6" id=commentsbox name="comments"></textarea><br />
      <input type="submit" name="submit" value="Add My Comment">
      <input type=checkbox name=CNremember  id=CNremember value=1><label for=CNremember> Remember Me</label> |
  <a href="javascript:CNforget();">Forget Me</a>
      </td>
    </tr>
  </table>
HTML;


$template_prev_next = <<<HTML
<p align="center">[prev-link]<< [/prev-link] {pages} [next-link][/next-link]</p>
HTML;
$template_comments_prev_next = <<<HTML
<p align="center">[prev-link]<<[/prev-link] ({pages}) [next-link] >>[/next-link]</p>
HTML;
?>
