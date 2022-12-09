---
extends: _layouts.post
section: content
title: Design hit counter
problemUrl: https://leetcode.com/problems/design-hit-counter/
date: 2022-12-09
categories: [design, queue]
---

We will use a queue to store the timestamps of the hits. We will remove the timestamps that are older than 300 seconds. Then we will return the size of the queue.

```python
class HitCounter:
    def __init__(self):
        self.hits = collections.deque()

    def hit(self, timestamp: int) -> None:
        self.hits.append(timestamp)

    def getHits(self, timestamp: int) -> int:
        while self.hits and timestamp - self.hits[0] >= 300:
            self.hits.popleft()
        return len(self.hits)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`