# Exercise 3: Generate HTML via initContainer
Generate the index.html in an [initContainer](https://kubernetes.io/docs/concepts/workloads/pods/init-containers/#init-containers-in-use)
and share the generated file via an empty directory to Nginx.

The number of ITERATIONS and FILENAME (to export) can be modified via [environment variables](https://kubernetes.io/docs/tasks/inject-data-application/define-environment-variable-container/#define-an-environment-variable-for-a-container).
```yaml
env:
  - name: FILENAME
    value: /tmp/index.html
  - name: ITERATIONS
    value: "999999"
```

Make sure `imagePullPolicy: Never # Force Kubernetes to use local docker image` a part of the pi-calculator container
configuration. Otherwise, Kubernetes will try to pull the pi-calculator image from a remote repository (where it doesn't exist).


## Useful commands
Build docker image
```shell
docker build -t pi-calculator:html-generator .
```

Apply Kubernetes files
```shell
kubectl apply -f .kubernetes
```

Follow logs (debugging):
```shell
kubectl logs -f -l app.kubernetes.io/name=pi-calculator
```

View the status of pods
```shell
kubectl get pods
```

Delete/recreate pod. Whenever the ConfigMap is changed, the pods aren't
automatically reloading the new configuration. By deleting the pods they will
be created again and use the new ConfigMap
```shell
kubectl delete pods -l app.kubernetes.io/name=pi-calculator
```

Delete Kubernetes files
```shell
kubectl delete -f .kubernetes
```
