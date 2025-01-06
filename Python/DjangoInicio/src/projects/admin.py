from django.contrib import admin
from .models import Project, Task

admin.site.register(Project) #Añadimos el modelo Project al panel de administración
admin.site.register(Task)


