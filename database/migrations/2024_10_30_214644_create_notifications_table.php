use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuário que receberá a notificação
            $table->foreignId('task_id')->nullable()->constrained()->onDelete('cascade'); // Tarefa associada
            $table->string('message'); // Mensagem da notificação
            $table->boolean('is_read')->default(false); // Status da notificação
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}

