---
extends: _layouts.post
section: content
title: Open the lock
problemUrl: https://leetcode.com/problems/open-the-lock/
date: 2022-10-24
categories: [graph]
---

We will use a queue to store the current state of the lock. Then we will iterate over the queue and check if the current state is the target state. If not, we will iterate over each digit and check if we can move the digit forward or backward. If yes, we will add the new state to the queue. If the queue is empty, we will return `-1`. Otherwise, we will return the number of steps.

```python
class Solution:
    def openLock(self, deadends: List[str], target: str) -> int:
        deadends = set(deadends)
        queue = ['0000']
        steps = 0
        
        while queue:
            qLen = len(queue)
            for _ in range(qLen):
                state = queue.pop(0)
                if state == target:
                    return steps
                if state not in deadends:
                    deadends.add(state)
                    for i in range(4):
                        for j in [-1, 1]:
                            newstate = state[:i] + str((int(state[i]) + j) % 10) + state[i+1:]
                            queue.append(newstate)
            steps += 1
        return -1
```

Time Complexity: `O(n^2)` <br/>
Space Complexity: `O(n)`