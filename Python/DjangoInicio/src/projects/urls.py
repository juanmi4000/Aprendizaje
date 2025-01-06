from django.urls import path
from . import views

# Al crear un archivo urls.py dentro de la app, podemos crear una lista de rutas que se pueden importar en el archivo urls.py del proyecto. Así se mantiene el archivo urls.py del proyecto más limpio y organizado.
urlpatterns = [
  path('', views.index, name="index"),
  path('about/<str:username>/', views.about, name="about"),
  path('projects_json/', views.projectsJSON, name="projects_json"),
  path('projects/', views.projects, name="projects"),
  path('project_details/<int:id>/', views.project_details, name="project_details"),
  path('create_project', views.create_project, name="create_project"),
  path('projects/<int:id>/', views.projectsId, name="projects_id"),
  path('tasks/', views.tasks, name="tasks"),
  path('create_task/', views.create_task, name="create_task"),
  path('view_test/<str:username>/<int:id>', views.view_test, name="view_test"),
]