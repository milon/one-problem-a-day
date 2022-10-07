---
extends: _layouts.post
section: content
title: Single threaded cpu
problemUrl: https://leetcode.com/problems/single-threaded-cpu/
date: 2022-10-07
categories: [heap]
---

First we sort the tasks according to start time, remember to keep a reference to the original task index. Set the current time to the first start time in the task list. Push all tasks whose start time is less than or equals to the current time into heap. We don't care about start time, since we know any item pushed into the heap is already past it's start time. Then we pop the first task to be processed, increase the current time by the processed time. We will repeat the process until process all the tasks.

```python
class Solution:
    def getOrder(self, tasks: List[List[int]]) -> List[int]:
        res = []
        tasks = sorted([(t[0], t[1], i) for i, t in enumerate(tasks)])
        i, heap = 0, []
        time = tasks[0][0]
        while len(res) < len(tasks):
            while (i < len(tasks)) and (tasks[i][0] <= time):
                heapq.heappush(heap, (tasks[i][1], tasks[i][2])) # (processing_time, original_index)
                i += 1
            if heap:
                t_diff, original_index = heapq.heappop(heap)
                time += t_diff
                res.append(original_index)
            elif i < len(tasks):
                time = tasks[i][0]
        return res
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(n)`