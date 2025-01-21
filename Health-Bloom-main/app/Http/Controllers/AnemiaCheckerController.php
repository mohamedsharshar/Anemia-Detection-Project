<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnemiaCheckerController extends Controller
{
    public function index()
    {
        return view('check');
    }

    public function checkSymptoms(Request $request)
{
    // بيانات الأمراض وأعراضها
    $data = [
        ["type" => "Healthy", "symptoms" => ["No symptoms or occasional fatigue"], "severity" => "Low", "treatment" => "No treatment needed"],
        ["type" => "Normocytic anemia", "symptoms" => ["Fatigue", "Paleness", "Shortness of breath", "Dizziness"], "severity" => "Moderate", "treatment" => "Iron supplements, healthy diet, manage underlying conditions."],
        ["type" => "Microcytic anemia", "symptoms" => ["Fatigue", "Weakness", "Shortness of breath", "Pale skin"], "severity" => "Moderate", "treatment" => "Iron supplements, blood tests to identify the cause."],
        ["type" => "Macrocytic anemia", "symptoms" => ["Fatigue", "Muscle weakness", "Pale or yellowish skin", "Shortness of breath"], "severity" => "High", "treatment" => "Vitamin B12 or folate supplementation, avoid alcohol."],
        ["type" => "Thrombocytopenia", "symptoms" => ["Easy bruising", "Bleeding gums", "Nosebleeds", "Prolonged bleeding"], "severity" => "High", "treatment" => "Platelet transfusion, manage underlying conditions."],
        ["type" => "Leukemia", "symptoms" => ["Frequent infections", "Fatigue", "Weight loss", "Easy bruising", "Swollen lymph nodes"], "severity" => "Very High", "treatment" => "Chemotherapy, stem cell transplant."],
        ["type" => "Iron deficiency anemia", "symptoms" => ["Extreme fatigue", "Weakness", "Cold hands and feet", "Brittle nails", "Cravings for non-nutritive substances like ice or dirt"], "severity" => "Moderate", "treatment" => "Iron supplements, diet rich in iron."],
        // إضافة أمراض أخرى حسب الحاجة
    ];

    // الحصول على الأعراض من الطلب
    $goal_symptoms = array_map('strtolower', array_map('trim', explode(',', $request->input('symptoms'))));
    $result = [];
    $match_found = false;

    // التحقق من الأعراض المدخلة
    foreach ($data as $disease) {
        $matches = count(array_uintersect($disease['symptoms'], $goal_symptoms, 'strcasecmp'));
        if ($matches > 0) {
            $match_found = true;
            $result[] = [
                "type" => $disease['type'],
                "matching_symptoms" => array_intersect(array_map('strtolower', $disease['symptoms']), $goal_symptoms),
                "message" => "Matching symptoms found.",
                "severity" => $disease['severity'],
                "treatment" => $disease['treatment']
            ];
        }
    }

    if (!$match_found) {
        $result[] = [
            "error" => "No matching disease found based on the entered symptoms."
        ];
    }

    return response()->json($result);
}
}
