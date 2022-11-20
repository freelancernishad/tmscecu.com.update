<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable = [

            "school_id",
            "Year",
            "AdmissionID",
            "StudentID",
            "StudentRoll",
            "StudentClass",
            "StudentGender",
            "StudentReligion",
            "StudentName",
            "StudentFatherName",
            "StudentMotherName",
            "StudentFatherOccupation",
            "StudentMotherOccupation",
            "ParentEmail",
            "ParentPassword",
            "StudentEmail",
            "StudentPassword",
            "StudentDateOfBirth",
            "StudentBirthCertificateNo",
            "StudentGroup",
            "StudentAddress",
            "StudentPhoneNumber",
            "AreaPostalCode",
            "StudentStatus",
            "StudentTranferFrom",
            "StudentPicture",
            "JoiningDate",
            "StudentTranferStatus",
            "AplicationStatus",
            "ThisMonthPaymentStatus",
            "status"


    ];


    public function Payments(){
        return $this->belongsTo(payment::class, 'StudentID', 'studentId');
    }
}
