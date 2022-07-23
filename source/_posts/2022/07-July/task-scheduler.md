---
extends: _layouts.post
section: content
title: Task scheduler
problemUrl: https://leetcode.com/problems/task-scheduler/
date: 2022-07-23
categories: [heap]
---

We will first count each characters and create a max heap out of it. Then we pop the item from the heap, put it on a queue, and increase the value of our counter. Then we process the task, if there is still task remaining for the same type, we push it back to the heap. After finishing each task, we return the time.

```python
from collections import Counter, deque
import heapq
from typing import List

class Solution:
    def leastInterval(self, tasks: List[str], n: int) -> int:
        count = Counter(tasks)
        maxHeap = [-cnt for cnt in count.values()]
        heapq.heapify(maxHeap)

        time = 0
        q = deque()
        while maxHeap or q:
            time += 1
            if not maxHeap:
                time = q[0][1]
            else:
                cnt = 1 + heapq.heappop(maxHeap)
                if cnt:
                    q.append([cnt, time+n])
            if q and q[0][1] == time:
                heapq.heappush(maxHeap, q.popleft()[0])

        return time
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`