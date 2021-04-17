# Exercise 1: Provide configuration at runtime
[Create configmap](https://kubernetes.io/docs/concepts/configuration/configmap/#configmaps-and-pods) and
[use it in the Deployment (mount to pod)](https://kubernetes.io/docs/concepts/configuration/configmap/#using-configmaps-as-files-from-a-pod),
in order to make Docker image more reusable.

The Nginx configuration for the ConfigMap can be found in nginx.conf.


## Get started
1. Add `127.0.0.1 pi-calculator.localhost` to hosts file (for Docker4mac. Other Kubernetes installers might use a
   different ip).
2. Apply Kubernetes files:
    ```shell
    kubectl apply -f .kubernetes
    ```
3. Go to `pi-calculator.localhost` in your browser and check if you see "standard" Nginx page.


## Via Docker
```shell
docker build -t pi-calculator:nginx .
docker run -ti --rm -v $PWD/nginx.conf:/etc/nginx/nginx.conf -p 8080:80 pi-calculator:nginx
```


## Useful commands
Build docker image
```shell
docker build -t pi-calculator:nginx .
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
