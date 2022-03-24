<?php 
include("getPersonalInformation.php");

include ("Calendar.php");


 ?>

<style>
    .calendar {
    display: flex;
    flex-flow: column;
}
.calendar .header .month-year {
    font-size: 20px;
    font-weight: bold;
    color: #636e73;
    padding: 20px 0;
}
.calendar .days {
    display: flex;
    flex-flow: wrap;
}
.calendar .days .day_name {
    width: calc(50% / 7);
    border-right: 1px solid #2c7aca;
    padding: 20px;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    color: #818589;
    color: #fff;
    background-color: #448cd6;
}
.calendar .days .day_name:nth-child(7) {
    border: none;
}
.calendar .days .day_num {
    display: flex;
    flex-flow: column;
    width: calc(61.5% / 7);
    border-right: 1px solid #e6e9ea;
    border-bottom: 1px solid #e6e9ea;
    padding: 15px;
    font-weight: bold;
    color: #7c878d;
    cursor: pointer;
    min-height: 100px;
}
.calendar .days .day_num span {
    display: inline-flex;
    width: 30px;
    font-size: 14px;
}
.calendar .days .day_num .event {
    margin-top: 10px;
    font-weight: 500;
    font-size: 14px;
    padding: 3px 6px;
    border-radius: 4px;
    background-color: #f7c30d;
    color: #fff;
    word-wrap: break-word;
}
.calendar .days .day_num .event.green {
    background-color: #51ce57;
}
.calendar .days .day_num .event.blue {
    background-color: #518fce;
}
.calendar .days .day_num .event.red {
    background-color: #ce5151;
}
.calendar .days .day_num:nth-child(7n+1) {
    border-left: 1px solid #e6e9ea;
}
.calendar .days .day_num:hover {
    background-color: #fdfdfd;
}
.calendar .days .day_num.ignore {
    background-color: #fdfdfd;
    color: #ced2d4;
    cursor: inherit;
}
.calendar .days .day_num.selected {
    background-color: #f1f2f3;
    cursor: inherit;
}
</style>

<h2><?php echo $surname." ".$firstname." ".$middlename?></h2>
<form method="POST">
<select id="months" name="taskOption">
        <option selected="true" disabled="disabled"> -- Select a Month -- </option>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
</select>
<input type="submit" name="submit" value="Generate Month"  />
</form>
<?php
   if (!empty($_POST["taskOption"])){
           $months=$_POST['taskOption'];
           $calendar = new Calendar("2015-$months");
           foreach ($data as $row) 
            {
                $time_row = $row['stimeS'];
                $calendar->data_row($time_row); 
            }
           if ($months=='1') {
          $calendar->add_event('New Year','2015-01-01',1,'red');
              echo $calendar;     
           }
           if ($months=='2') {
          $calendar->add_event('Chinese New Year','2015-02-12',1,'red');  
          $calendar->add_event('Valentines Day','2015-02-14',1,'red');
          $calendar->add_event('People Power Anniversary','2015-02-25',1,'red');
              echo $calendar;     
           }
           if ($months=='3') {
              echo $calendar;     
           }
           if ($months=='4') {
          $calendar->add_event('Maundy Thursday','2015-04-01',1,'red');
          $calendar->add_event('Good Friday','2015-04-02',1,'red');
          $calendar->add_event('Bataan Day','2015-04-09',1,'red');
              echo $calendar;     
           }
           if ($months=='5') {
          $calendar->add_event('Labour Day','2015-05-01',1,'red');
          $calendar->add_event('Eid al-Fitr','2015-05-13',1,'red');
              echo $calendar;     
           }
           if ($months=='6') {
          $calendar->add_event('Independence Day','2015-06-12',1,'red');
              echo $calendar;     
           }
           if ($months=='7') {
          $calendar->add_event('Eid al-Adha','2015-07-19',2,'red');
              echo $calendar;     
           }
           if ($months=='8') {
          $calendar->add_event('National Heroes Day ','2015-08-30',1,'red');
          $calendar->add_event('Ninoy Aquino Day','2015-08-21',1,'red');
              echo $calendar;     
           }
            if ($months=='9') {
              echo $calendar;     
           }
            if ($months=='10') {
              echo $calendar;     
           }
           if ($months=='11') {
          $calendar->add_event('All Souls Day','2015-11-01',1,'red');  
          $calendar->add_event('Bonifacio Day ','2015-11-30',1,'red');
              echo $calendar;     
           }
           if ($months=='12') {
          $calendar->add_event('Feast of the Immaculate Conception ','2015-12-08',1,'red');
          $calendar->add_event('Christmas Day ','2015-12-25',1,'red');
          $calendar->add_event('Rizal Day ','2015-12-30',1,'red');
              echo $calendar;     
           }   
       } else {
        echo "Please select a month";
       }
    
?>

