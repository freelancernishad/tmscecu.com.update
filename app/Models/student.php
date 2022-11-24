<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [

        'school_id',
        'Year',
        'AdmissionID',
        'StudentID',
        'StudentRoll',
        'StudentClass',
        'StudentGender',
        'StudentReligion',
        'StudentName',
        'StudentNameEn',
        'StudentFatherNameBn',
        'StudentFatherName',
        'StudentMotherNameBn',
        'StudentMotherName',
        'StudentFatherNid',
        'StudentMotherNid',
        'StudentFatherBCN',
        'StudentMotherBCN',
        'StudentFatherOccupation',
        'parentEarn',
        'StudentMotherOccupation',
        'ParentEmail',
        'ParentPassword',
        'StudentEmail',
        'StudentPassword',
        'StudentDateOfBirth',
        'StudentBirthCertificateNo',
        'StudentCategory',
        'StudentKota',
        'bigBroSis',
        'bigBroSisName',
        'bigBroSisClass',
        'bigBroSisRoll',
        'StudentGroup',
        'StudentAddress',
        'StudentPhoneNumber',
        'AreaPostalCode',
        'StudentStatus',
        'StudentTranferFrom',
        'StudentPicture',
        'JoiningDate',
        'StudentTranferStatus',
        'AplicationStatus',
        'ThisMonthPaymentStatus',
      


    ];


    public function Payments(){
        return $this->belongsTo(payment::class, 'StudentID', 'studentId');
    }
}
