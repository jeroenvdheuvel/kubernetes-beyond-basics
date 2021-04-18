# Exercise 4: Generate HTML via multistage build
Generate index.html (via pi-html-generator.php & pi-calculator.php) with PHP
(first stage) and copy the index.html to the Nginx image (second stage).

More about [Docker multistage images can be found here](https://docs.docker.com/develop/develop-images/multistage-build/).

## Useful commands
Build docker image
```shell
docker build -t pi-calculator:nginx-multistage .
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
