---
extends: _layouts.post
section: content
title: Number of recent calls
problemUrl: https://leetcode.com/problems/number-of-recent-calls/
date: 2022-10-11
categories: [queue, design]
---

We will use a queue to store the recent calls. We will remove the calls that are not in the range of 3000ms. Then we will return the size of the queue.

```python
class RecentCounter:
    def __init__(self):
        self.q = collections.deque()

    def ping(self, t: int) -> int:
        self.q.append(t)
        while self.q[0] < t-3000:
            self.q.popleft()
        return len(self.q)

# Your RecentCounter object will be instantiated and called as such:
# obj = RecentCounter()
# param_1 = obj.ping(t)
```

Time complexity: O(n) <br/>
Space complexity: O(n)