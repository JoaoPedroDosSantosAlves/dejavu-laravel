use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('task_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->constrained()->onDelete('cascade'); // Tarefa concluída
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuário responsável
            $table->timestamp('completed_at')->nullable(); // Data de conclusão
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_history');
    }
}
