# Exercise 7: Horizontal pod autoscaling
[Create horizontal pod autoscale configuration](https://www.giantswarm.io/blog/horizontal-autoscaling-in-kubernetes)
for the deployment. The autoscaler should aim for 70% CPU utilization.

Make sure you installed the [Kubernetes metrics server](https://github.com/kubernetes-sigs/metrics-server) in order to
keep track of resource utilization. The command below will install the Kubernetes metrics server in "insecure" mode.
This is the easiest way to get it running on local machines.
```shell
kubectl apply -f kubernetes-metrics-server.yaml
```

View kubectl information about your autoscale configuration
```shell
kubectl get hpa
```

View events of your autoscale configuration 
```shell
kubectl describe hpa -l app.kubernetes.io/name=pi-calculator
```

Simulate load with `load-generator.sh` that keeps on making curl requests to http://pi-calculator.localhost/


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
