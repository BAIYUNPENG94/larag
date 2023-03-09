<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expense_listings', function (Blueprint $table) {
            $table->id();
            $table->date('creation_date')->nullable('false');
            $table->date('issue_date')->nullable('false');
            $table->date('addmission_date')->nullable('false');
            $table->string('status')->nullable('false');
            $table->string('content')->nullable('false');
            $table->string('type')->nullable('false'); // Need check in a set
            $table->string('trans_type')->nullable(); // Need check in a set
            $table->unsignedInteger('amount')->nullable('false'); // Need check above or equals to 0
            $table->string('creator')->nullable('false');
            $table->string('payment_target')->nullable('false');
            $table->string('receipt_path')->nullable();
            $table->string('remark')->nullable();
            $table->unsignedInteger('year')->nullable('false')->default(0);
            $table->unsignedInteger('month')->nullable('false')->default(0);
            $table->string('url')->nullable();
            $table->string('manager')->nullable('false');
            $table->string('reject_reason')->nullable();
            $table->string('approve_reason')->nullable();

            $table->unsignedInteger('C_10000')->nullable('false')->default(0); // All need check
            $table->unsignedInteger('C_5000')->nullable('false')->default(0);
            $table->unsignedInteger('C_2000')->nullable('false')->default(0);
            $table->unsignedInteger('C_1000')->nullable('false')->default(0);
            $table->unsignedInteger('C_500')->nullable('false')->default(0);
            $table->unsignedInteger('C_100')->nullable('false')->default(0);
            $table->unsignedInteger('C_50')->nullable('false')->default(0);
            $table->unsignedInteger('C_10')->nullable('false')->default(0);
            $table->unsignedInteger('C_5')->nullable('false')->default(0);
            $table->unsignedInteger('C_1')->nullable('false')->default(0);

            $table->check('trans_type IN ("Bank", "Currency", "Payment")');
            $table->check('type IN ("Transport", "Buying", "Losting")');
            $table->check('amount >= 0');
            $table->check('month <13');
            $table->check('C_10000 >= 0');
            $table->check('C_5000 >= 0');
            $table->check('C_2000 >= 0');
            $table->check('C_1000 >= 0');
            $table->check('C_500 >= 0');
            $table->check('C_100 >= 0');
            $table->check('C_50 >= 0');
            $table->check('C_10 >= 0');
            $table->check('C_5 >= 0');
            $table->check('C_1 >= 0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_listings');
    }
};
