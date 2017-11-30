<?php
/**
 * Created by IntelliJ IDEA.
 * User: billt
 * Date: 10/14/2017
 * Time: 12:51 PM
 */

include_once($_SERVER["DOCUMENT_ROOT"] . '/cebookcovers/headers_footers/header1.php');

//$sendToAddress = "ce-bookcovers@charter.net";
$sendToAddress = "bill.tucker.la@gmail.com";

?>

<div class="container">
    <input type="hidden" id="sendTo" name="sendTo" value="<?php echo($sendToAddress); ?>">
    <form id="mailer" name="mailer" action="code/mail-processor.php" method="post" role="form">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope-o fa-fw"></i>
                        </span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control" placeholder="Enter Subject">
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-groupl">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" class="form-control" rows="9" cols="25" placeholder="Email Message"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right" id="sendMessage" name="sendMessage">Send Message</button>
            </div>
        </div>
    </form>


</div>

<?php

include_once($_SERVER["DOCUMENT_ROOT"] . '/cebookcovers/headers_footers/footer.php');

?>
