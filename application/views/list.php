<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Appointment Management System</title>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>/resource/css/style.css">

    </head>
    <body>

        <div id="container">
            <h1>Welcome to Appointment Management System</h1>
            <h3 id="error-reporting"><?php echo $this->session->flashdata('error'); ?></h3> 
            <div id="body">
                <div id="newDiv"><button id="newBtn">NEW</button></div>
                <div id="newAppointDiv" style="display: none">
                    <form action="appointment/add" method="post">
                        <div class="pd5">
                            <input type="submit" id="addBtn" value="Add">
                            <button id="cancelBtn" onclick="return false;">Cancel</button><br>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"><label>DATE</label></div>
                            <div class="col-sm"><input type="text" id="dateIpt" name="date"/></div></div>
                        <div class="row">
                            <div class="col-sm-1"><label>TIME</label></div>
                            <div class="col-sm"><input type="text" id="timeIpt" name="time"/></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"><label>DESC</label></div>
                            <div class="col-sm"><input type="text" maxlength="200" id="descIpt" name="desc"/></div>
                        </div>
                    </form>
                </div>
                <div id="searchDiv">
                    <input type="text" placeholder="Search Appointment" width="200px" id="searchIpt"/>
                    <button id="searchBtn">SEARCH</button>
                </div>

                <table id="apptTbl">
                    <thead>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Description</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
        <script>

            function generateAppointment(data) {
                console.log(data);
                var content = '';
                var dateApp;
                var day;
                var time;

                if (data.length == 0) {
                    content = '<tr><td colspan="3">No appointment</td></tr>';
                } else {
                    for (var i = 0; i < data.length; i++) {
                        dateApp = new Date(data[i]['time']);
                        day = (dateApp.getMonth() + 1) + '/' + dateApp.getDate();
                        time = dateApp.getHours() + ':' + dateApp.getMinutes();
                        content += '<tr><td>' + day + '</td>' + '<td>' + time + '</td>' + '<td>' + data[i]['description'] + '</td>' + '</tr>';
                    }
                }

                $('#apptTbl tbody').empty().append(content);
            }
            function getAppointments() {
                $.ajax({
                    url: 'appointment/listAppt',
                    dataType: 'json',
                }).done(generateAppointment);
            }


            function addAppointment() {
                $.ajax({
                    url: 'add',
                    type: 'POST',
                    data: {
                        date: $('#dateIpt').val(),
                        time: $('#timeIpt').val(),
                        desc: $('#descIpt').val()
                    },
                    beforeSend: function(xhr, setting) {
                        // validate in client
                        if (isNaN(Date.parse($('#dateIpt').val()))) {
                            alert("Something wrong!");
                            xhr.abort();
                            return false;                        
                        }
                        // TO_DO: need to check other field
                    }
                }).done(function () {
                    getAppointments();
                    $('#newAppointDiv').toggle();
                    $('#newDiv').toggle();
                });
            }

            function searchAppointment() {
                $.ajax({
                    url: 'appointment/search',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        keyword: $('#searchIpt').val()
                    }
                }).done(generateAppointment);
            }

            $(document).ready(function () {
                getAppointments();

                $('#newBtn').click(function () {
                    $('#newAppointDiv').toggle();
                    $('#newDiv').toggle();
                });

                $('#cancelBtn').click(function () {
                    $('#newAppointDiv').toggle();
                    $('#newDiv').toggle();
                });

                $('#dateIpt').datepicker({
                    minDate: 0
                });

                $('#timeIpt').timepicker({
                    timeFormat: 'h:mm p',
                    interval: 15,
                    minTime: '10',
                    maxTime: '6:00pm',
                    startTime: '10:00',
                    dynamic: true,
                    dropdown: true,
                    scrollbar: true
                });

                $('#searchBtn').click(searchAppointment);
            });
        </script>
    </body>
</html>