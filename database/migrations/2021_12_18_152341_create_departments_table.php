<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('short');
        });

        DB::table('departments')->insert([
            [
                'name' => 'Centre for African and International Studies',
                'short' => 'cais'
            ], [
                'name' => 'Classics and Philosophy',
                'short' => 'classics'
            ], [
                'name' => 'Communication Studies',
                'short' => 'comstudies'
            ], [
                'name' => 'English',
                'short' => 'english'
            ], [
                'name' => 'French',
                'short' => 'french'
            ], [
                'name' => 'Ghanaian Languages and Linguistics',
                'short' => 'ghanalang'
            ], [
                'name' => 'History',
                'short' => 'history'
            ], [
                'name' => 'Music and Dance',
                'short' => 'music'
            ], [
                'name' => 'Religion and Human Values',
                'short' => 'religion'
            ], [
                'name' => 'Theatre and Film Studies',
                'short' => 'theatre'
            ], [
                'name' => 'Information and Literacy Skills Unit',
                'short' => 'infolit'
            ], [
                'name' => 'Centre for Child Development Research and Referral',
                'short' => 'ccdrr'
            ], [
                'name' => 'Counselling Centre',
                'short' => 'counselling'
            ], [
                'name' => 'Basic Education',
                'short' => 'basiced'
            ], [
                'name' => 'Education and Psychology',
                'short' => 'edpsych'
            ], [
                'name' => 'Guidance and Counseling',
                'short' => 'dgc'
            ], [
                'name' => 'Resource Centre for Alternative Media & Assistive Technology',
                'short' => 'rcamat'
            ], [
                'name' => 'Centre for Coastal Management',
                'short' => 'coastal'
            ], [
                'name' => 'Biochemistry',
                'short' => 'biochemistry'
            ], [
                'name' => 'Conservation Biology and Entomology',
                'short' => 'dcbe'
            ], [
                'name' => 'Environmental Science',
                'short' => 'environmental'
            ], [
                'name' => 'Fisheries & Aquatic Sciences',
                'short' => 'dfas'
            ], [
                'name' => 'Forensic Sciences',
                'short' => 'forensic'
            ], [
                'name' => 'Molecular Biology & Biotechnology',
                'short' => 'dmbb'
            ], [
                'name' => 'Centre for Entrepreneurship & Small Enterprise',
                'short' => 'cesed'
            ], [
                'name' => 'Accounting',
                'short' => 'accounting'
            ], [
                'name' => 'Finance',
                'short' => 'finance'
            ], [
                'name' => 'Human Resource Management',
                'short' => 'dhrm'
            ], [
                'name' => 'Management',
                'short' => 'management'
            ], [
                'name' => 'Marketing and Supply Chain Management',
                'short' => 'marketing'
            ], [
                'name' => 'Centre for Gender Research, Advocacy and Documentation',
                'short' => 'cegrad'
            ], [
                'name' => 'Geography and Regional Planning',
                'short' => 'grp'
            ], [
                'name' => 'Hospitality and Tourism Management',
                'short' => 'hospitality'
            ], [
                'name' => 'Population and Health',
                'short' => 'population'
            ], [
                'name' => 'Sociology and Anthropology',
                'short' => 'sociology'
            ], [
                'name' => 'Institute for Oil and Gas Studies',
                'short' => 'oilngas'
            ], [
                'name' => 'Centre for Teacher Professional Development',
                'short' => 'ctpd'
            ], [
                'name' => 'Centre for Teaching Support',
                'short' => 'cts'
            ], [
                'name' => 'Institute of Education',
                'short' => 'instedu'
            ], [
                'name' => 'Clinical Teaching Programme',
                'short' => 'ctp'
            ], [
                'name' => 'Community-Based Experience and Service',
                'short' => 'cobes'
            ], [
                'name' => 'Chemical Pathology',
                'short' => 'pathology'
            ], [
                'name' => 'Clinical Nutrition and Dietetics',
                'short' => 'dietetics'
            ], [
                'name' => 'Community Medicine',
                'short' => 'dcm'
            ], [
                'name' => 'Internal Medicine',
                'short' => 'internalmed'
            ], [
                'name' => 'Medical Biochemistry',
                'short' => 'medibio'
            ], [
                'name' => 'Microbiology and Immunology',
                'short' => 'microbiology'
            ], [
                'name' => 'Obstetrics and Gynaecology',
                'short' => 'obstetrics'
            ], [
                'name' => 'Paediatrics and Child Health',
                'short' => 'paediatrics'
            ], [
                'name' => 'Physiology',
                'short' => 'physiology'
            ], [
                'name' => 'Psychological Medicine and Mental Health',
                'short' => 'pmmh'
            ], [
                'name' => 'Surgery',
                'short' => 'surgery'
            ], [
                'name' => 'Anatomy',
                'short' => 'anatomy'
            ], [
                'name' => 'Medical Education & IT',
                'short' => 'mediit'
            ], [
                'name' => 'Problem-Based Learning Unit',
                'short' => 'pblu'
            ], [
                'name' => 'Mathematics and Science (CoDE)',
                'short' => 'codems'
            ], [
                'name' => 'Business Studies (CoDE)',
                'short' => 'codebs'
            ], [
                'name' => 'Education (CoDE)',
                'short' => 'codeedu'
            ], [
                'name' => 'Adult Nursing',
                'short' => 'adultns'
            ], [
                'name' => 'Maternal and Child Health',
                'short' => 'dmch'
            ], [
                'name' => 'Mental Health',
                'short' => 'mentalhlth'
            ], [
                'name' => 'Public Health',
                'short' => 'publichlth'
            ], [
                'name' => 'Agricultural Economics and Extension',
                'short' => 'agricext'
            ], [
                'name' => 'Agricultural Engineering',
                'short' => 'agriceng'
            ], [
                'name' => 'Animal Science',
                'short' => 'animal'
            ], [
                'name' => 'Crop Science',
                'short' => 'crop'
            ], [
                'name' => 'Soil Science',
                'short' => 'soil'
            ], [
                'name' => 'Applied Economics',
                'short' => 'appliedecons'
            ], [
                'name' => 'Data Science and Economic Policy',
                'short' => 'datascience'
            ], [
                'name' => 'Economics Studies',
                'short' => 'economics'
            ], [
                'name' => 'Economic Policy Modelling Unit',
                'short' => 'epmu'
            ], [
                'name' => 'Arts Education',
                'short' => 'artsedu'
            ], [
                'name' => 'Business and Social Sciences Education',
                'short' => 'dbsse'
            ], [
                'name' => 'Biomedical Sciences',
                'short' => 'biomedical'
            ], [
                'name' => 'Health Information Management',
                'short' => 'dhim'
            ], [
                'name' => 'Medical Imaging and Sonography Technology',
                'short' => 'sonography'
            ], [
                'name' => 'Medical Laboratory Technology',
                'short' => 'medilab'
            ], [
                'name' => 'Nutrition and Dietetics',
                'short' => 'nutrition'
            ], [
                'name' => 'Optometry',
                'short' => 'optometry'
            ], [
                'name' => 'Physician Assistant Studies',
                'short' => 'dpas'
            ], [
                'name' => 'Sports Sciences',
                'short' => 'sports'
            ], [
                'name' => 'Chemistry',
                'short' => 'chemistry'
            ], [
                'name' => 'Computer Science and Information Technology',
                'short' => 'dcsit'
            ], [
                'name' => 'Laboratory Technology',
                'short' => 'labtech'
            ], [
                'name' => 'Mathematics',
                'short' => 'mathematics'
            ], [
                'name' => 'Physics',
                'short' => 'physics'
            ], [
                'name' => 'Statistics',
                'short' => 'statistics'
            ], [
                'name' => 'Industrial Chemistry',
                'short' => 'industchem'
            ], [
                'name' => 'Water and Sanitation Programme (Chemistry)',
                'short' => 'dwspchem'
            ], [
                'name' => 'Environment, Governance and Sustainable Development',
                'short' => 'degsd'
            ], [
                'name' => 'Integrated Development Studies',
                'short' => 'dids'
            ], [
                'name' => 'Labour and Human Resource Studies',
                'short' => 'labour'
            ], [
                'name' => 'Peace Studies',
                'short' => 'peace'
            ], [
                'name' => 'Health, Physical Education and Recreation',
                'short' => 'dhper'
            ], [
                'name' => 'Mathematics and ICT Education',
                'short' => 'dmicte'
            ], [
                'name' => 'Science Education',
                'short' => 'scienceedu'
            ], [
                'name' => 'Vocational and Technical Education',
                'short' => 'votec'
            ], [
                'name' => 'Law',
                'short' => 'law'
            ], [
                'name' => 'Legal Extension',
                'short' => 'legalext'
            ], [
                'name' => 'Pharmaceutical Chemistry',
                'short' => 'pharmchem'
            ], [
                'name' => 'Pharmaceutical Microbiology',
                'short' => 'pharmmicro'
            ], [
                'name' => 'Pharmaceutics',
                'short' => 'pharmaceutics'
            ], [
                'name' => 'Pharmacognosy',
                'short' => 'pharmacognosy'
            ], [
                'name' => 'Pharmacology',
                'short' => 'pharmacology'
            ], [
                'name' => 'Pharmacy Practice',
                'short' => 'pharmacyprac'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
