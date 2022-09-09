---
extends: _layouts.post
section: content
title: Design twitter
problemUrl: https://leetcode.com/problems/design-twitter/
date: 2022-08-06
categories: [heap, design]
---

This is a classic object oriented design problem. We will use a hashmap for the tweet map and another hashmap for the follow map. Each element of the tweet map with be a list, and each element of the list will have the tweetId and the count of the current timestamp. This timestamp will be a global attribute, so every method can reach it. Each element of the follow map will be a set, so we don't duplicate the same follower twice.

Whenever we need to get the news feed, we will create a maxheap, and take top 10 result based on the timestamp. But as python does not have a builtin max heap, so we will use a min heap and we will start out timestamp at 0. And each time someone posted a tweet, we will decrease the time by 1.

And follow and unfollow are very basic operation, we will add the follower id in the follow map and remove it for unfollowing.

```python
class Twitter:
    def __init__(self):
        self.count = 0
        self.tweetMap = collections.defaultdict(list)
        self.followMap = collections.defaultdict(set)

    def postTweet(self, userId: int, tweetId: int) -> None:
        self.tweetMap[userId].append([self.count, tweetId])
        self.count -= 1

    def getNewsFeed(self, userId: int) -> List[int]:
        res = []
        minHeap = []
        self.followMap[userId].add(userId)
        
        for followeeId in self.followMap[userId]:
            if followeeId in self.tweetMap:
                index = len(self.tweetMap[followeeId]) - 1
                count, tweetId = self.tweetMap[followeeId][index]
                heapq.heappush(minHeap, [count, tweetId, followeeId, index - 1])
        
        while minHeap and len(res) < 10:
            count, tweetId, followeeId, index = heapq.heappop(minHeap)
            res.append(tweetId)
            if index >= 0:
                count, tweetId = self.tweetMap[followeeId][index]
                heapq.heappush(minHeap, [count, tweetId, followeeId, index - 1])
                
        return res

    def follow(self, followerId: int, followeeId: int) -> None:
        self.followMap[followerId].add(followeeId)

    def unfollow(self, followerId: int, followeeId: int) -> None:
        if followeeId in self.followMap[followerId]:
            self.followMap[followerId].remove(followeeId)

# Your Twitter object will be instantiated and called as such:
# obj = Twitter()
# obj.postTweet(userId,tweetId)
# param_2 = obj.getNewsFeed(userId)
# obj.follow(followerId,followeeId)
# obj.unfollow(followerId,followeeId)
```

Time Complexity: `O(1)`, for each operation, `O(n*u)` for news feed, where n is the number of tweets, and u is the number of users. <br/>
Space Complexity: `O(n*u)`, where n is the number of tweets, and u is the number of users.