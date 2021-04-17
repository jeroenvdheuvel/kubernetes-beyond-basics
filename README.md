# Exercise 2: Use smaller base image & run container without root
[Use a smaller base image for Nginx](https://hub.docker.com/_/nginx) and [run the image without root](https://kubernetes.io/docs/tasks/configure-pod-container/security-context/#set-the-security-context-for-a-container),
for instance with user id: 65534 (nobody on Linux systems).  The Nginx configuration (ConfigMap) is already
modified and will work without root. Keep in mind that ports < 1024 can only be claimed by root.

Image sizes can be checked via:
```shell
docker images
```

## Via Docker
```shell
docker build -t pi-calculator:nginx-small-base .
docker run -ti --rm -v $PWD/nginx.conf:/etc/nginx/nginx.conf -p 8080:8080 pi-calculator:nginx-small-base
```


## Useful commands
Build docker image
```shell
docker build -t pi-calculator:nginx-small-base .
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
