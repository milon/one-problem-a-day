---
extends: _layouts.post
section: content
title: Time needed to inform all employees
problemUrl: https://leetcode.com/problems/time-needed-to-inform-all-employees/
date: 2023-06-02
categories: [graph]
---

We will start BFS from the manager with no manager. We will keep track of the maximum time taken to inform all the employees.

```python
class Solution:
    def numOfMinutes(self, n: int, headID: int, manager: List[int], informTime: List[int]) -> int:
        graph = collections.defaultdict(list)
        for i, m in enumerate(manager):
            graph[m].append(i)
        
        q = collections.deque([(headID, 0)])
        maxTime = 0
        
        while q:
            emp, time = q.popleft()
            maxTime = max(maxTime, time)
            for sub in graph[emp]:
                q.append((sub, time + informTime[emp]))
        
        return maxTime
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`