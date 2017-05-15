<?php

//Contact informations
class Contacts
{
    private $skype;
    private $email;
    private $telephone;

    public function setSkype($skype)
    {
        $this->skype = $skype;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getSkype()
    {
        return $this->skype;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }
}


//Status of user, only one privilege can be true at once
class Status
{
    private $is_Banned;

    //privilege modes;
    private $is_Guest;
    private $is_Registered;
    private $is_Moder;

    public function is_Guest(): bool
    {
        return $is_Guest;
    }

    public function is_Registered(): bool
    {
        return $is_Registered;
    }

    public function is_Moder(): bool
    {
        return $is_Moder;
    }

    public function is_Banned(): bool
    {
        return $is_Banned;
    }

    public function setBanned($is_banned)
    {
        $is_Banned = $is_banned;
        $is_Guest = false;
    }

    public function setModer($is_moder)
    {
        $is_Moder = $is_moder;
        $is_Guest = false;
    }

    public function setRegistered($is_registered)
    {
        $is_Registered = $is_registered;
        $is_Guest = false;
    }

    public function setGuest($is_guest)
    {
        $is_Guest = $is_guest;
    }
}

//This is report class, it contains report about post.
class Report
{
    private $report_comment;
    private $reporter;
    private $report_date;
    private $reported_post;

    public function setReportComment($comment)
    {
        $report_comment = $comment;
    }

    public function setReporter($reporter)
    {
        $this->reporter = $reporter;
    }

    public function setReportDate($date)
    {
        $this->report_date = $date;
    }

    public function setReportedPost($post)
    {
        $this->reported_post = $post;
    }

    public function getReportComment()
    {
        return $this->report_comment;
    }

    public function getReporter()
    {
        return $this->reporter;
    }

    public function getReportDate()
    {
        return $this->report_date;
    }

    public function getReportedPost()
    {
        return $this->reported_post;
    }
}

//Date class
class Date
{
    private $hour;
    private $minute;
    private $second;
    private $day;
    private $month;
    private $year;

    public function setHour(int $hour)
    {
        $this->hour = $hour;
    }

    public function setMinute(int $minute)
    {
        $this->minute = $minute;
    }

    public function setSecond(int $second)
    {
        $this->second = $second;
    }

    public function setDay(int $day)
    {
        $this->day = $day;
    }

    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    public function setYear(int $year)
    {
        $this->year = $year;
    }

    public function setCurrentDate()
    {
    }
}

class Location
{
    private $street;
    private $city;
    private $state;
    private $country;

    public function setStreet( $street)
    {
        $this->street = $street;
    }

    public function setCity( $city)
    {
        $this->city = $city;
    }

    public function setState( $state)
    {
        $this->state = $state;
    }

    public function setCountry( $country)
    {
        $this->country = $country;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getCountry()
    {
        return $this->country;
    }
}

class Currency
{
    private $amount;
    private $currency;

    public function setAmount( $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $amount;
    }

    public function setCurrency( $currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $currency;
    }
}

class Ban
{
    private $ban_reason;
    private $ban_date;

    public function setBanReason( $ban_reason)
    {
        $this->ban_reason = $ban_reason;
    }

    public function getBanReason()
    {
        return $ban_reason;
    }

    public function setBanDate( $ban_date)
    {
        $this->ban_date = $ban_date;
    }

    public function getBanDate()
    {
        return $ban_date;
    }
}
