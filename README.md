# Exercise 6: Define container resources
Define [CPU and memory requests and limits](https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/)
for both containers.

[Docker stats](https://docs.docker.com/engine/reference/commandline/stats/) can give you more information about the CPU
and memory utilization.
```shell
docker stats
```

These resource values should work:
Nginx
Memory request: 8mb, limit: 8mb
CPU request: 0.01, limit 0.01

PHP-FPM
Memory request: 16mb, limit: 16mb
CPU request: 0.25, limit: 0.5 (over commit)


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
