from django import forms

# Create a new task form.
# Envierselo al HTML
class CreateNewTask(forms.Form):
  title = forms.CharField(label="Titulo de tarea", max_length=200, widget=forms.TextInput(attrs={'class': 'input'}))
  description = forms.CharField(widget=forms.Textarea(attrs={'class': 'input'}), label="Descripción de la tarea")

class CreateNewProject(forms.Form):
  name = forms.CharField(label="Nombre del proyecto", max_length=200, widget=forms.TextInput(attrs={'class': 'input'}))