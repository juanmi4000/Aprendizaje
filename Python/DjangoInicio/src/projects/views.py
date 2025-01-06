from django.shortcuts import render, get_list_or_404, redirect
from .models import Project, Task
from django.http import HttpResponse, JsonResponse
from .forms import CreateNewTask, CreateNewProject

# Create your views here.


def index(request):
    title = "Welcome to Django"
    return render(request, 'index.html', {
        'title': title
    })


def about(request, username):
    return HttpResponse(f"<h1>Sobre {username}</h1>")


def projects(request):
    projects = Project.objects.all()
    return render(request, 'projects/projects.html', {
        'projects': projects
    })


def projectsJSON(request):
    projects = list(Project.objects.values())
    return JsonResponse(projects, safe=False)


def projectsId(request, id):
    # project = Project.objects.get(id=id)
    # En caso de que no exista el proyecto, se devuelve un error 404
    project = get_list_or_404(Project, id=id)
    return HttpResponse(f"<h1>Nombre del proyecto: {project.name} </h1>")


def create_project(request):
    if request.method == 'GET':
        return render(request, 'projects/create_project.html', {
            'form': CreateNewProject()
        })
    else:
        Project.objects.create(name=request.POST['name'])
        return redirect('projects') # le paso el nombre de la ruta


def tasks(request):
    tasks = Task.objects.all()
    return render(request, 'tasks/tasks.html', {
        'tasks': tasks
    })


def create_task(request):
    # print(request.GET) # Asi se obtiene los datos enviados por GET
    # print(request.GET['title']) # Asi se obtiene un dato enviado
    if request.method == 'GET':
        return render(request, 'tasks/create_task.html', {
            'form': CreateNewTask()
        })
    else:
        # Creo un objeto con los datos que me pasen
        Task.objects.create(
            title=request.POST['title'],
            description=request.POST['description'],
            project_id=2
        )
        # Le pongo la / delante porque sino lo que hace es añadirle a la url actual la ruta task/
        # Para que se redirija a la ruta task se le pone la / delante (osea desde la raiz)
    # Redirijo a la vista task, Cuando usas render, si el usuario envía un formulario y luego actualiza la página, el navegador podría reenviar el formulario, causando que los datos se procesen nuevamente
    return redirect('tasks') # le paso el nombre de la ruta, también puedo pasarle la url directamente ('/tasks')

def project_details(request, id):
    project = get_list_or_404(Project, id=id)
    tasks = Task.objects.filter(project_id=id)
    return render(request, 'projects/project_details.html', {
        'project': project[0],
        'tasks': tasks
    })


def view_test(request, username, id):
    return render(request, 'view_test.html', {
        'username': username,   
        'id': id
    })
 