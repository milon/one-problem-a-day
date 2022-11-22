---
extends: _layouts.post
section: content
title: Process tasks using servers
problemUrl: https://leetcode.com/problems/process-tasks-using-servers/
date: 2022-11-22
categories: [heap]
---

We will use two heaps to simulate. The first heap will be a min heap of the servers. The second heap will be a min heap of the tasks. Then, we will iterate through the tasks. If the task is less than the current time, then we will add the server to the heap. If the task is greater than or equal to the current time, then we will add the server to the heap. Then, we will pop the server from the heap. If the server is not available, then we will increment the current time. If the server is available, then we will add the server to the heap. Then, we will add the server to the result. Then, we will increment the current time.

```python
class Solution:
    def assignTasks(self, servers: List[int], tasks: List[int]) -> List[int]:
        freeServers = []
        busyServers = []
        res = []
        
        for server, weight in enumerate(servers):
            heapq.heappush(freeServers, (weight, server, 0))
            
        for currTime, duration in enumerate(tasks):
            while busyServers and busyServers[0][0] <= currTime or not freeServers:
                time, weight, server = heapq.heappop(busyServers)
                heapq.heappush(freeServers, (weight, server, time))
                
            weight, server, time = heapq.heappop(freeServers)
            res.append(server)
            heapq.heappush(busyServers, (max(currTime, time) + duration, weight, server))
        
        return res         
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`