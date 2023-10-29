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
        'sscroll',
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
        'guardNameBn',
        'guardName',
        'guardNid',
        'guardRalation',
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
        'StudentKotaSonodNo',
        'preSchool',
        'preClass',
        'bigBroSis',
        'bigBroSisName',
        'bigBroSisClass',
        'bigBroSisGroup',
        'bigBroSisRoll',
        'StudentGroup',
        'StudentSubject',
        'StudentAddress',
        'division',
        'district',
        'upazila',
        'union',
        'post_office',
        'StudentPhoneNumber',
        'AreaPostalCode',
        'stipend',
        'StudentStatus',
        'StudentTranferFrom',
        'StudentPicture',
        'JoiningDate',
        'StudentTranferStatus',
        'AplicationStatus',
        'ThisMonthPaymentStatus',
        'StudentBirthC',
        'fatherNidF',
        'fatherNidB',
        'motherNidF',
        'motherNidB',



    ];

    public function assessments()
    {
        return $this->hasMany(AssessmentRecord::class);
    }

    public function Payments(){
        return $this->belongsTo(payment::class, 'StudentID', 'studentId');
    }


    public function paymentform()
        {
            return $this->hasMany(payment::class, 'AdmissionID', 'AdmissionID');
        }

}
