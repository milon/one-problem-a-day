---
extends: _layouts.post
section: content
title: Find the winner of the circular game
problemUrl: https://leetcode.com/problems/find-the-winner-of-the-circular-game/
date: 2022-09-29
categories: [queue]
---

We can use a queue and add all the numbers to the queue and then remove every kth element. Then when just one item is left in the queue, we return that item.

```python
class Solution:
    def findTheWinner(self, n: int, k: int) -> int:
        q = collections.deque(range(1, n+1))
        while len(q) > 1:
            for _ in range(k-1):
                q.append(q.popleft())
            q.popleft()
        return q[0]
```

Time Complexity: `O(n*k)` <br/>
Space Complexity: `O(n)`