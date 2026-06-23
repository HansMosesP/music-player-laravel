 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
 
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
 
            $table->foreignId('song_id')
                ->constrained('songs')
                ->cascadeOnDelete();
 
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'DatabaseSeeder',
            '--force' => true
        ]);
    }
 
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};