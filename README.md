# Exercise 5: Health checks
[Add any (startup, readiness, liveness) health check probe](https://kubernetes.io/docs/tasks/configure-pod-container/configure-liveness-readiness-startup-probes/)
to both containers.


## Useful commands
Build docker image
```shell
docker build -t pi-calculator:php-fpm .
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
