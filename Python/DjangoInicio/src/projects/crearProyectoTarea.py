from models import Project, Task

p = Project(name="aplicacion movil") # Creo un objeto de la clase Proyect

p.save() # Guardo el objeto en la base de datos

print(p.task_set.all()) #Obtengo todas las tareas relacionadas con el objeto p

p.task_set.create(title="crear modelo", description="crear modelo de la aplicacion movil") # Creo una tarea relacionada con el objeto p
print(p.task_set.get(id=1)) #  Obtengo el objeto de la clase Task con id=1

print(p.task_set.filter(name__startswith="crear")) #  Obtengo el objeto de la clase Task con id=1

t = Task(title="crear vista", description="crear vista de la aplicacion movil", project=p) # Creo un objeto de la clase Task que tiene una relación con el objeto p

t.save() 

print(Project.objects.all()) # Muestro todos los objetos de la clase Proyect
print(Project.objects.get(id=1)) # Obtengo el objeto de la clase Proyect con id=1


