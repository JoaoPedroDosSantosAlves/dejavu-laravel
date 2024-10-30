use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título da tarefa
            $table->text('description')->nullable(); // Descrição da tarefa
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Chave estrangeira para o usuário
            $table->foreignId('room_id')->nullable()->constrained()->onDelete('set null'); // Cômodo associado
            $table->enum('priority', ['baixa', 'média', 'alta'])->default('média'); // Nível de prioridade
            $table->timestamp('due_date')->nullable(); // Prazo da tarefa
            $table->boolean('completed')->default(false); // Status de conclusão
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
