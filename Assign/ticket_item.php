<?php
if ($rowTicket['tp_universal'] == '1') {
    $tickeId=$rowTicket['ticketshowid'];
    $expire=$rowTicket['expire_date'];
    if($rowTicket['type']=="adult") {
    $type="A";
    }
    elseif($rowTicket['type']=="child")
    {
    $type="C";
    }
    elseif($rowTicket['type']=="comp")
    {
    $type="COM";
    } 
    else 
    {
    $type="YOU";
    }
    $DateTotimeStamp=strtotime($expire);

    $expire=date("m/d",$DateTotimeStamp);

    $LastTicket=substr($tickeId, -8);
    //$ticketToShow=$type.' '.$LastTicket.' '.$expire;
    $ticketToShow=$type.' '.$LastTicket.' '.'Exp'.$expire;
    echo '<option value="'.$tickeId.'">'.$ticketToShow.'</option>';
    
} else if($rowTicket['tp_code'] == 'CF') {
    $tickeId=$rowTicket['ticketshowid'];
    $LastTicket=substr($tickeId, -8);
    $ticketToShow = $rowTicket['tp_code']. " " . $LastTicket . " " . $rowTicket['gender']; 
    echo '<option value="'.$tickeId.'">'.$ticketToShow.'</option>';
} else {
    $tickeId=$rowTicket['ticketshowid'];
    $LastTicket=substr($tickeId, -8);
    $ticketToShow = $rowTicket['tp_code']. " " . $LastTicket;
    echo '<option value="'.$tickeId.'">'.$ticketToShow.'</option>'; 
}
?>
                                