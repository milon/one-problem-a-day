---
extends: _layouts.post
section: content
title: Moving average from data stream
problemUrl: https://leetcode.com/problems/moving-average-from-data-stream/
date: 2022-12-13
categories: [queue, design]
---

We will use a queue to store the values. We will keep track of the sum of the values in the queue. We will add the new value to the queue and remove the oldest value from the queue. We will return the sum of the values in the queue divided by the size of the queue.

```python
class MovingAverage:
    def __init__(self, size: int):
        self.size = size
        self.queue = collections.deque()
        self.sum = 0

    def next(self, val: int) -> float:
        if len(self.queue) == self.size:
            self.sum -= self.queue.popleft()
        self.queue.append(val)
        self.sum += val
        return self.sum / len(self.queue)
```

Time complexity: `O(1)` <br/>
Space complexity: `O(n)`